<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class AdhocRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view("room.adhoc");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("room.create_adhoc");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    // remember to remove metsdata and add those qusetion stuff , remeber security her is optionalll, it should be very easy and fluid
    {
                $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'wifi_bssid' => 'required|string', // any device identifier
            'metadata' => 'sometimes|string',
            'verification_type' => 'required|in:qrcode,fingerprint',
            'location' => 'required|string', // geofencing check for right datatype
            'device_uuid' => 'required', // unique identifier for user or device
            'data' => 'sometimes|array',
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
