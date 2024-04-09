<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class BookingSideController extends Controller
{
    public function book(){
        return view('booking.bookingside');
    }

    public function bookingDetails(Request $request){
        //FROM HOTEL 2 PAYMENT AND BILLING
        $booking_details = Http::get('https://h4-billpay-pos.anaa-hrms.com/api/booking-details');
        $booking_data = $booking_details->json();

        return view('bookingDetails.booking_details_index', compact('booking_data'));
    }
}
