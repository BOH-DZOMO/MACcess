<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomGeofence;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class AdhocRoomController extends Controller
{


    public function index()
    {
        // $rooms = Room::select(['id', 'name', 'room_uuid', 'description', 'delete_status', 'updated_at', 'created_at'])
        //     ->where('room_type', 'unstructured')
        //     ->where('delete_status', 0)
        //     ->latest()
        //     ->simplePaginate(10);


        // Fetching raw data for speed
        $rooms = DB::table('rooms')
    ->selectRaw("
        id, 
        name, 
        room_uuid, 
        description, 
        delete_status, 
        TO_CHAR(updated_at, 'Mon DD, YYYY') as formatted_updated_at, 
        created_at
    ")
    ->whereRaw("room_type = 'unstructured' AND delete_status = false")
    ->orderByRaw("created_at DESC")
    ->simplePaginate(10);

        //raw sql
        $perPage = 10;
    $page = Paginator::resolveCurrentPage() ?: 1;
    
    // For simplePaginate, we fetch $perPage + 1 to see if a "next" page exists
    // $limit = $perPage + 1;
    // $offset = ($page - 1) * $perPage;

    // $roomsRaw = DB::select("
    //     SELECT 
    //         id, 
    //         name, 
    //         room_uuid, 
    //         description, 
    //         delete_status, 
    //         TO_CHAR(updated_at, 'Mon DD, YYYY') as formatted_updated_at, 
    //         created_at
    //     FROM rooms
    //     WHERE room_type = 'unstructured' 
    //       AND delete_status = false
    //     ORDER BY created_at DESC
    //     LIMIT ? OFFSET ?
    // ", [$limit, $offset]);

    // Manually create the SimplePaginator so your Blade @foreach and links still work
    // $rooms = new Paginator(
    //     $roomsRaw, 
    //     $perPage, 
    //     $page, 
    //     ['path' => Paginator::resolveCurrentPath()]
    // );

        return view('room.adhoc', compact('rooms'));
    }
    /**
     * Show the review page with session draft data.
     */
    public function review()
    {
        $draft = session('adhoc_room_draft', []);
        return view('room.review_adhoc', compact('draft'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("room.create_adhoc");
    }

    /**
     * Save form data to session and redirect to the review step.
     */
    public function storeSession(Request $request)
    {
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'description'         => 'nullable|string',
            'wifi_bssid'          => 'nullable|string',
            'verification_type'   => 'nullable|array',
            'verification_type.*' => 'in:fingerprint,geofence',
            'activation_date'     => 'required|date',
            'activation_time'     => 'required|date_format:H:i',
            'activation_duration' => 'required|integer|min:1',
            'latitude'            => 'required_if:requiresGeofence,true|nullable|numeric',
            'longitude'           => 'required_if:requiresGeofence,true|nullable|numeric',
            'geofence_radius'     => 'required_if:requiresGeofence,true|nullable|numeric',
            'geofence_shape'      => 'required_if:requiresGeofence,true|nullable|in:circle,polygon',
            'geofence_polygon'    => 'required_if:requiresGeofence,true|nullable|string',
            'location'            => 'nullable|string|max:255',
            'questions'           => 'nullable|array|max:5',
            'questions.*.title'   => 'required|string|max:255',
            'questions.*.type'    => 'required|in:text,radio,checkbox',
            'questions.*.options' => 'required_if:questions.*.type,radio,checkbox|array',
        ]);

        session()->put('adhoc_room_draft', $data);

        return redirect()->route('rooms.adhoc.create.review');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the data coming from the review page form
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'description'         => 'nullable|string',
            'wifi_bssid'          => 'nullable|string',
            'verification_type'   => 'nullable|array',
            'activation_date'     => 'required|date',
            'activation_time'     => 'required|date_format:H:i',
            'activation_duration' => 'required|integer|min:1',
            'latitude'            => 'nullable|numeric',
            'longitude'           => 'nullable|numeric',
            'geofence_radius'     => 'nullable|numeric',
            'geofence_shape'      => 'nullable|in:circle,polygon',
            'geofence_polygon'    => 'nullable|string',
            'location'            => 'nullable|string|max:255',
            'questions'           => 'nullable|array',
            'questions.*.title'   => 'required|string|max:255',
            'questions.*.type'    => 'required|in:text,radio,checkbox',
            'questions.*.options' => 'nullable|array',
        ]);

        $user = $request->user();

        // 1. Create Room
        $room = Room::create([
            'room_uuid' => Str::uuid()->toString(),
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'room_type' => "unstructured",
            'wifi_bssid' => $data['wifi_bssid'] ?? null,
            'created_by' => $user->id,
            'verification_type' => $data['verification_type'] ?? [],
            'location' => $data['location'],

            'metadata' => [
                'questions' => $data['questions'] ?? [],
                'activation_date' => $data['activation_date'],
                'activation_time' => $data['activation_time'],
                'activation_duration' => $data['activation_duration'],
            ],
        ]);

        // 2. Add Geofence if active
        if (in_array('geofence', $data['verification_type'] ?? [])) {
            try {
                $boundary = null;
                if ($data['geofence_shape'] === 'circle') {
                    $boundary = DB::raw("ST_GeographyFromText('POINT({$data['longitude']} {$data['latitude']})')");
                } else {
                    $points = json_decode($data['geofence_polygon'], true);
                    if (is_array($points)) {
                        $coordString = implode(', ', array_map(fn($p) => "{$p[1]} {$p[0]}", $points));
                        $boundary = DB::raw("ST_GeographyFromText('POLYGON(({$coordString}))')");
                    }
                }

                RoomGeofence::create([
                    'room_id' => $room->id,
                    'shape_type' => $data['geofence_shape'],
                    'boundary' => $boundary,
                    'radius' => $data['geofence_radius'] ?? null,
                    'is_active' => true,
                ]);
            } catch (\Exception $e) {
                logger()->error('Adhoc Geofence creation failed: ' . $e->getMessage());
            }
        }

        $duration = (int) $data['activation_duration'];

        // 3. One-off time window (Adhoc)
        $end_time = Carbon::parse($data['activation_time'])->addMinutes($duration)->format('H:i');

        DB::table('time_windows')->insert([
            'name' => 'Adhoc Activation',
            'room_id' => $room->id,
            'day' => $data['activation_date'], // Use date as day for adhoc
            'start_time' => $data['activation_time'],
            'end_time' => $end_time,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->forget('adhoc_room_draft');

        return redirect()->route('rooms.adhoc.index')->with('success', 'Adhoc Room created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
