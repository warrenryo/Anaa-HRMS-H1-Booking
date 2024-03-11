<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RoomDetails;
use Illuminate\Http\Request;

class RoomDesController extends Controller
{
    public function room_ds(){
        $room = RoomDetails::all();
        return view('frontdesk.roomdetails', compact('room'));
    }
}
