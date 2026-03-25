<?php

namespace App\Http\Controllers;

use App\Models\Room;
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
        if ($user->is_active && $user->device->is_active && $user->device->device_uuid === $data['device_uuid']) {

            $room_data = [
                'room_type' => "unstructured",
                'name' => $data['name'],
                'description' => $data['description'],
                'metadata' => $data['metadata'] ?? null,
                'location' => $data['location'],
                'wifi_bssid' => $data['wifi_bssid'],
                'created_by' => $user->id,
                'verification_type' => $data['verification_type'],
                'room_uuid' => Str::uuid()->toString(),
            ];

            try {
                if ($room = Room::create($room_data)) {
                    if (isset($data['data'])) {
                        $window_data = array_map(function ($array) use ($room) {
                            return [
                                'name' => $array['name'],
                                'room_id' => $room->id,
                                'day' => $array['day'],
                                'start_time' => $array['start_time'],
                                'end_time' => $array['end_time'],
                            ];
                        }, $data['data']);
                        DB::table('time_windows')->insert($window_data);
                    }

                    return response()->json([
                        "success" => true,
                        'message' => 'Official Room created with success with time window']
                    , 201);
                } else {
                    return response()->json(['message' => 'account or device not verified', "success" => false], 404);
                }
            } catch (QueryException $e) {
                return response()->json(["success" => false, 'error' => [$e->getMessage() . ' error occured when creating room']], 404);
            }
        } else {
            return response()->json(['message' => 'Invalid request or user']);
        }
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
