<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnaaBookingController extends Controller
{
    public function anaa(){
        return view('booking.anaa-booking');
    }
}
