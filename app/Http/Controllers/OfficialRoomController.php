<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomGeofence;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OfficialRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('room.official');
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
            'wifi_bssid' => $data['wifi_bssid'],
            'verification_type' => json_encode($data['verification_type']),
            'location' => $data['geofence_shape'] === 'circle' 
                ? "{$data['latitude']},{$data['longitude']}" 
                : "polygon",
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

        return redirect()->route('rooms.official.index')->with('success', 'Official Room created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('room.official_detail', compact('room'));
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
