<?php

namespace App\Http\Controllers;

use App\Models\RoomDetails;
use Illuminate\Http\Request;
use App\Models\RoomTypesModel;
use App\Http\Controllers\Controller;

class HomeBookController extends Controller
{
    public function homebook(){


        $rooms = RoomDetails::where('RoomStatus', 'Vacant')->paginate(6);
        return view('booking.home', compact('rooms'));

    }

    public function bookingSide(Request $request){
        $user = $request->user();
        $rooms = RoomDetails::where('RoomStatus', 'Vacant')->paginate(6);
        return view('booking.home2', compact('rooms', 'user'));
    }

    public function allRooms(Request $request){
        $user = $request->user();
        $rooms = RoomDetails::where('RoomStatus', 'Vacant')->get();
        return view('booking.allRooms', compact('rooms','user'));
    }
}
