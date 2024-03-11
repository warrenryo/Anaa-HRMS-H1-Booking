<?php

namespace App\Http\Controllers;

use App\Models\GuestInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OccupiedController extends Controller
{
    public function occupied(){

        $active_bookings = GuestInfo::all();
        return view('frontdesk.occupied', compact('active_bookings'));
    }
   
}
