<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;

class RoomController extends Controller
{
    public function store_structured(Request $request)
    {
        $data = $request->validate([
            'label_handle' => 'required|string',
            'brief_note' => 'required',
            // 'mode_flag' => 'required|string', // structured or unstructured
            'anchor_sig' => 'required|string', // any device identifier
            'extra_data' => 'sometimes|string',
            'check_mode' => 'required|in:qrcode,fingerprint,device_check,otp',
            'geo_hint' => 'required|string', // geofencing check for right datatype
            'trace_tag' => 'required' // unique identifier for user or device
            // 'data' => 'sometimes|array',
        ],[

        ]);
        //for extra_data or metadata it should be json i.e the name of field and metadata about it
        $user = $request->user();
        if ($user->is_active && $user->device->is_active && $user->device->device_uuid === $data['trace_tag']) {

            $pre_room = Arr::except($data, ['device_uuid']);
            $room_data = [];
            $room_data['room_type'] = "unstructured";        // $pre_room['mode_flag'];
            $room_data['name'] = $pre_room['label_handle'];
            $room_data['description'] = $pre_room['brief_note'];
            $room_data['metadata'] = $pre_room['extra_data'];
            $room_data['location'] = $pre_room['geo_hint'];
            $room_data['wifi_bssid'] = $pre_room['anchor_sig'];
            $room_data['created_by'] = $user->id;
            $room_data['verification_type'] = $pre_room['check_mode'];
            $room_data['room_uuid'] = Str::uuid()->toString();
            try {
                if ($room = Room::create($room_data)) {
                    if (isset($data['data'])) {
                        $window_data = array_map(function ($array) use ($room) {
                            return [
                                'name' => $array['label_handle'],
                                'room_id' => $room->id,
                                'day' => $array['cycle_key'],
                                'start_time' => $array['open_at'],
                                'end_time' => $array['close_at'],
                            ];
                        }, Arr::only($data, ['data'])['data']);
                        DB::table('time_windows')->insert($window_data);
                    }

                    return response()->json([
                        "success" => true,
                        'message' => 'Official Room created with success with time window']
                    ,201);
                } else {
                    return response()->json(['message' => 'account or device not verified',"success" => false],404);
                }
            } catch (QueryException $e) {
                return response()->json(["success" => false,'error' => [$e->getMessage().'error occured when creating room']], 404);
            }
        } else {
            return response()->json(['message' => 'Invalid request or user']);
        }
    }

    public function store_unstructured(Request $request)
    {
        // return response()->json(["data"=>$request->all()]);
        $data = $request->validate([

            'label_handle' => 'required|string',
            'brief_note' => 'required',
            // 'mode_flag' => 'required|string', // structured or unstructured
            'anchor_sig' => 'required|string', // any device identifier
            'extra_data' => 'required|string',
            'geo_hint' => 'required|string', // geofencing check for right datatype
            'trace_tag' => 'required', // unique identifier for user or device
            
        ],
    [

    ]);
        $user = $request->user();
        if ($user->is_active && $user->device->is_active && $user->device->device_uuid === $data['trace_tag']) {

            $pre_room = Arr::except($data, ['device_uuid']);
            $room_data = [];
            $room_data['name'] = $pre_room['label_handle'];
            $room_data['room_type'] = "structured";   // $pre_room['mode_flag'];
            $room_data['description'] = $pre_room['brief_note'];
            $room_data['metadata'] = $pre_room['extra_data'];
            $room_data['location'] = $pre_room['geo_hint'];
            $room_data['wifi_bssid'] = $pre_room['anchor_sig'];
            $room_data['created_by'] = $user->id;
            $room_data['room_uuid'] = Str::uuid()->toString();

            try {
                if ($room = Room::create($room_data)) {
                    return response()->json(['message' => 'Adhoc Room created with success']);
                } else {
                    return response()->json(['message' => 'account or device not verified']);
                }
            } catch (QueryException $e) {
                return response()->json(['error' => $e->getMessage().'error occured when creating room'], 404);
            }
        } else {
            return response()->json(['message' => 'Invalid request or user']);
        }
    }


    public function getAdhocRooms(Request $request)
    {
        // fetch all rooms linked to wifi_bssid and send with nmae,description and time frame
        $user = $request->user();
        if ($user->is_active && $user->device->is_active) {

            $data = $request->validate(
                ['anchor_sig' => 'required']
            );
            // $room = DB::table('rooms')->select(["name","room_uuid","room_type","metadata","verification_type","description"])->where("wifi_bssid","00:1a:2b:5c:4d:5e")->get();
            $room = Room::select('name', 'room_uuid', 'description')->where('delete_status', 'false')->where('wifi_bssid',$data["anchor_sig"])->get();

            return response()->json(['data' => $room]);
        } else {
            return response()->json(['message' => 'Invalid request or user']);
        }
    }

    public function getOfficialRooms(Request $request)
    {
        // fetch all rooms linked to wifi_bssid and send with nmae,description and time frame
        $user = $request->user();
        if ($user->is_active && $user->device->is_active) {

            $data = $request->validate(
                ['anchor_sig' => 'required']
            );
            // $room = DB::table('rooms')->select(["name","room_uuid","room_type","metadata","verification_type","description"])->where("wifi_bssid","00:1a:2b:5c:4d:5e")->get();
            $room = Room::select('name', 'room_uuid', 'description')->where('delete_status', 'false')->where('wifi_bssid',$data["anchor_sig"])->get();

            return response()->json(['data' => $room]);
        } else {
            return response()->json(['message' => 'Invalid request or user']);
        }
    }

    public function enrollOfficialRoom(Request $request)
    {
        //may need to add location just to verify that user is within reach
        //may need to aplly cache for room anmes so they can easily be accessed from uuid
        $user = $request->user();
        if ($user->is_active && $user->device->is_active) {
            $data = $request->validate([
                    'trace_id' => ['required','uuid'],
                    'data' => ['sometimes',"array"],
                    'entry_stamp' => ['required'],
                ]);
                try {
                //try to cache this data or select both name and id at once
                $room_name = Room::where("room_uuid",$data['trace_id'])->value('name');
                $room_id = DB::table('rooms')->where('room_uuid', $data['trace_tag'])->value('id');
                $membership = DB::table('room_memberships')->insert(
                    [
                        'user_id' => $user->id,
                        'room_id' => $room_id,
                        'joined_at' => $data['entry_stamp'],
                        'metadata' => json_encode($data['data']),
                    ]
                );
                return response()->json(['message' => "succesfully registered to room $room_name"]);
            } catch (QueryException $e) {
                return response()->json(['message' => $e->getMessage()]);
            }
        } else {
            return response()->json(['message' => 'Invalid request or user']);
        }

        $data = $request->validate([
            'room_uuid' => ['required'],
            'data' => ['sometimes'],
        ]);
    }
}

// assume you are a profession secretary and you work for a non governmental organisation called NDF and you want to write a letter that will request help from people of good weal to support us financially in our  activities , please write a letter of apeal for help for people wishing to help these are our numbers where they can contact us or send the money through 671317454