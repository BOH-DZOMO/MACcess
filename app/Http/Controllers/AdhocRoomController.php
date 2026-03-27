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

class AdhocRoomController extends Controller
{


    public function index()
    {
        return view('room.adhoc');
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
        $data = session('adhoc_room_draft');

        if (!$data) {
            return redirect()->route('rooms.adhoc.create')->with('error', 'Session expired. Please start over.');
        }

        $user = $request->user();

        // 1. Create Room
        $room = Room::create([
            'room_uuid' => Str::uuid()->toString(),
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'room_type' => "unstructured",
            'wifi_bssid' => $data['wifi_bssid'],
            'created_by' => $user->id,
            'verification_type' => $data['verification_type'] ?? [],
            'location' => $data['latitude'] ? $data['latitude'] . ',' . $data['longitude'] : '0,0',
            'metadata' => json_encode([
                'questions' => $data['questions'] ?? [],
                'activation_date' => $data['activation_date'],
                'activation_time' => $data['activation_time'],
                'activation_duration' => $data['activation_duration'],
            ]),
        ]);

        // 2. Add Geofence if active
        if (in_array('geofence', $data['verification_type'] ?? [])) {
            $geofence_data = [
                'room_id' => $room->id,
                'shape_type' => $data['geofence_shape'],
            ];

            if ($data['geofence_shape'] === 'circle') {
                $geofence_data['center_lat'] = $data['latitude'];
                $geofence_data['center_lng'] = $data['longitude'];
                $geofence_data['radius'] = $data['geofence_radius'];
            } else {
                $geofence_data['polygon_data'] = $data['geofence_polygon'];
            }

            RoomGeofence::create($geofence_data);
        }

        // 3. One-off time window (Adhoc)
        $end_time = Carbon::parse($data['activation_time'])->addMinutes($data['activation_duration'])->format('H:i');
        
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
