<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutBookings extends Controller
{
    public function checkout(){
        return view('frontdesk.checkout');
    }
}
