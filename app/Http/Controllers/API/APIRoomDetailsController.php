<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RoomDetails;
use Illuminate\Http\Request;

class APIRoomDetailsController extends Controller
{
    public function roomDetails(){
        $room = RoomDetails::all();

        return response()->json($room);
    }

    public function updateRoom(Request $request){
        $new_status = RoomDetails::where('RoomNumber', $request['RoomNumber'])->first();

        $new_status->update([
            'RoomStatus' => $request['RoomStatus']
        ]);
    }


    //UPDATE  IF THE ROOM STATUS TO RESERVED IF DONE BOOKING
    public function reservedRoom(Request $request){
        $room = RoomDetails::where('RoomNumber', $request['room_no'])->first();

        $new_status = $room->update([
            'RoomStatus' => $request['new_status']
        ]);
    }
}
