<?php

namespace App\Http\Controllers;

use App\Models\GuestInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveBookingsController extends Controller
{
    public function index(){

        $active_bookings = GuestInfo::all();
        return view('frontdesk.activebookings', compact('active_bookings'));
    }
}
