<?php

namespace App\Http\Controllers;

use App\Models\RoomDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function book(){
        
        $rooms = RoomDetails::where('RoomStatus', 'Vacant')->get();
        return view('frontdesk.booking', compact('rooms'));
    }
}
