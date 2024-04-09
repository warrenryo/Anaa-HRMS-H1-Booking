<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reviews\ReviewModel;
use App\Models\RoomDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookNowController extends Controller
{
    public function book_now($id){
        $rooms = RoomDetails::find($id);
        $reviews = ReviewModel::where('status', 'Approved')->where('room_id', $id)->paginate(3);
        $room_type = $rooms->RoomType;
        $avail_rooms = RoomDetails::where('RoomType', $room_type)->where('RoomStatus', 'Vacant')->get();
        return view('booking.booknowIndex', compact('rooms', 'avail_rooms', 'reviews'));
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


    public function bookingConfirmation(Request $request, $id){
        $rooms = RoomDetails::find($id);
        $user = $request->user();
        $today = Carbon::now()->toDateString();
        return view('booking.bookingForm.bookingConfirmation', compact('rooms', 'today', 'request', 'user'));
    }


}
