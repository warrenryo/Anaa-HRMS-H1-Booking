<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function AppointmentController(){
        return view('housekeeping.housekeepingIndex');
    }
}
