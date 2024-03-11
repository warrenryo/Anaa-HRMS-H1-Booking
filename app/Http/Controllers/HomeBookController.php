<?php

namespace App\Http\Controllers;

use App\Models\RoomDetails;
use Illuminate\Http\Request;
use App\Models\RoomTypesModel;
use App\Http\Controllers\Controller;

class HomeBookController extends Controller
{
    public function homebook(){


        $rooms = RoomDetails::all();
        return view('booking.home', compact('rooms'));

    }
}
