<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomGeofence;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OfficialRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rooms = Room::select(['id', 'name', 'room_uuid', 'description', 'delete_status', 'updated_at', 'created_at'])
        //     ->where('room_type', 'structured')
        //     ->where('delete_status', 0)
        //     ->latest()
        //     ->simplePaginate(10);

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
            ->whereRaw("room_type = 'structured' AND delete_status = false")
            ->orderByRaw("created_at DESC")
            ->simplePaginate(10);


        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Official rooms fetched successfully',
                'data' => ["items" => $rooms->items(), 'pagination' => [
                    'current_page' => $rooms->currentPage(),
                    'next_page' => $rooms->nextPageUrl(),
                    'per_page' => $rooms->perPage(),
                ]]
            ]);
        }   


        return view('room.official', compact('rooms'));
    }

    /**
     * Show the review page with session draft data.
     */
    public function review()
    {
        $draft = session('official_room_draft', []);
        return view('room.official_review', compact('draft'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room.create_official');
    }

    /**
     * Save form data to session and redirect to the review step.
     */
    public function storeSession(Request $request)
    {
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'description'         => 'nullable|string',
            'wifi_bssid'          => 'required|string',
            'verification_type'   => 'nullable|array',
            'verification_type.*' => 'in:fingerprint,qrcode',
            // Geofence — stored as-is, backend validation deferred
            'latitude'            => 'nullable|numeric',
            'longitude'           => 'nullable|numeric',
            'geofence_radius'     => 'nullable|numeric',
            'geofence_shape'      => 'nullable|in:circle,polygon',
            'geofence_polygon'    => 'nullable|string',
            'location'            => 'required|string|max:255',
            // Timeframe
            'timeframe_label'     => 'nullable|string|max:255',
            'timeframe_start'     => 'nullable|date_format:H:i',
            'timeframe_end'       => 'nullable|date_format:H:i',
            'timeframe_days'      => 'nullable|string',
        ]);

        // Flash all validated data to session so the review page can read it
        session()->put('official_room_draft', $data);

        return redirect()->route('rooms.official.create.review');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'wifi_bssid' => 'required|string',
            'verification_type' => 'required|array',
            'verification_type.*' => 'in:fingerprint,qrcode',
            'geofence_shape' => 'required|in:circle,polygon',
            'latitude' => 'required_if:geofence_shape,circle|nullable|numeric',
            'longitude' => 'required_if:geofence_shape,circle|nullable|numeric',
            'geofence_radius' => 'required_if:geofence_shape,circle|nullable|numeric',
            'geofence_polygon' => 'required_if:geofence_shape,polygon|nullable|string',
            'location' => 'required|string|max:255',
            'timeframe_label'     => 'required|string|max:255',
            'timeframe_start'     => 'required|date_format:H:i',
            'timeframe_end'       => 'required|date_format:H:i',
            'timeframe_days'      => 'required|string',
        ]);

        $user = $request->user();

        // 1. Create Room
        $room = Room::create([
            'room_uuid' => Str::uuid()->toString(),
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'room_type' => "structured",
            'wifi_bssid' => $data['wifi_bssid'] ?? 'Any',
            'verification_type' => $data['verification_type'] ?? [],
            'location' => $data['location'],

            'created_by' => $user->id,
        ]);

        if (!$room) {
            return redirect()->back()->withInput()->with('error', 'Failed to create room');
        }

        // 2. Create Geofence (PostGIS)
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
            logger()->error('Geofence creation failed: ' . $e->getMessage());
        }

        // 3. Create Time Windows
        try {
            $days = json_decode($data['timeframe_days'], true);
            if (is_array($days)) {
                $dayMapping = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                $timeWindows = [];
                foreach ($days as $dayIndex) {
                    $timeWindows[] = [
                        'name' => $data['timeframe_label'],
                        'room_id' => $room->id,
                        'day' => $dayMapping[$dayIndex] ?? $dayIndex,
                        'start_time' => $data['timeframe_start'],
                        'end_time' => $data['timeframe_end'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                if (!empty($timeWindows)) {
                    DB::table('time_windows')->insert($timeWindows);
                }
            }
        } catch (\Exception $e) {
            logger()->error('Time window creation failed: ' . $e->getMessage());
        }

        // 4. Clear the session draft
        session()->forget('official_room_draft');

        return redirect()->route('rooms.official.index')->with('success', 'Official Room created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $room->load(['geofence', 'timeWindows']);
        $membersCount = $room->users()->count();

        
        return view('room.official_detail', compact('room', 'membersCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room) {
        $room->load(['geofence', 'timeWindows']);
        return view('room.edit_official', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'wifi_bssid' => 'required|string',
            'verification_type' => 'required|array',
            'verification_type.*' => 'in:fingerprint,qrcode',
            'geofence_shape' => 'required|in:circle,polygon',
            'latitude' => 'required_if:geofence_shape,circle|nullable|numeric',
            'longitude' => 'required_if:geofence_shape,circle|nullable|numeric',
            'geofence_radius' => 'required_if:geofence_shape,circle|nullable|numeric',
            'geofence_polygon' => 'required_if:geofence_shape,polygon|nullable|string',
            'location' => 'required|string|max:255',
            'timeframe_label'     => 'required|string|max:255',
            'timeframe_start'     => 'required|date_format:H:i',
            'timeframe_end'       => 'required|date_format:H:i',
            'timeframe_days'      => 'required|string',
        ]);

        try {

            // 1. Update Room
            $room->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'wifi_bssid' => $data['wifi_bssid'],
                'verification_type' => $data['verification_type'],
                'location' => $data['location'],
            ]);

            // 2. Update Geofence
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

            RoomGeofence::updateOrCreate(
                ['room_id' => $room->id],
                [
                    'shape_type' => $data['geofence_shape'],
                    'boundary' => $boundary,
                    'radius' => $data['geofence_radius'] ?? null,
                ]
            );

            // 3. Update Time Windows
            $room->timeWindows()->delete();
            $daysArray = json_decode($data['timeframe_days'], true);
            if (is_array($daysArray)) {
                $dayMapping = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                $timeWindows = [];
                foreach ($daysArray as $dayIndex) {
                    $timeWindows[] = [
                        'name' => $data['timeframe_label'],
                        'room_id' => $room->id,
                        'day' => $dayMapping[$dayIndex] ?? $dayIndex,
                        'start_time' => $data['timeframe_start'],
                        'end_time' => $data['timeframe_end'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                if (!empty($timeWindows)) {
                    DB::table('time_windows')->insert($timeWindows);
                }
            }

            return redirect()->route('rooms.official.index')->with('success', 'Official Room updated successfully');

        } catch (\Exception $e) {
            logger()->error('Official Room Update failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    /**
     * Show the invite page for the specified resource.
     */
    public function invite(Request $request, Room $room)
    {
        $userId = $request->user() ? $request->user()->id : $request->session()->getId();
        
        // Use Cache facade for consistent key prefixing and storage
        // This makes sure the SSE stream and this controller see the SAME key
        Log::info("Invite for ID: " . $userId);


        Cache::put("user_viewing_invite_{$userId}", $room->room_uuid, 300);

        return view('room.official_invite', compact('room'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->update([
            'delete_status' => 1,
        ]);

        return redirect()->route('rooms.official.index')->with('success', 'Official Room deleted successfully');
    }
}
