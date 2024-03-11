<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingSideController extends Controller
{
    public function book(){
        return view('booking.bookingside');
    }
}
