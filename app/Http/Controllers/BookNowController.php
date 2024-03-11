<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RoomDetails;
use Illuminate\Http\Request;

class BookNowController extends Controller
{
    public function book_now($id){
        $rooms = RoomDetails::find($id);
        $room_type = $rooms->RoomType;
        $avail_rooms = RoomDetails::where('RoomType', $room_type)->where('RoomStatus', 'Vacant')->get();
        return view('booking.booknowIndex', compact('rooms', 'avail_rooms'));
    }

    public function bookForm(Request $request){
        $room_type = $request['room_type'];
        $room = $request['rooms'];
        $start = $request['start'];
        $end = $request['end'];
        $duration = $request['duration'];
        $additional = json_encode($request['services']);
        return view('booking.bookingForm.bookingForm', compact('start', 'end', 'duration','additional', 'room', 'room_type'));
    }
}
