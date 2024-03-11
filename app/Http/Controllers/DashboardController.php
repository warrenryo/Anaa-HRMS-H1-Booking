<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookingModel\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $booking = Booking::count();
        return view('/dashboard', compact('booking'));
    }
}
