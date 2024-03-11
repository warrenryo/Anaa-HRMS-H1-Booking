<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookingModel\Booking;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getBookingData(Request $request)
    {
        $booking = new Booking;

        if ($booking) {
            $booking->create([
                'reserve_code' => $request['reserve_code'],
                'room_no' => $request['room_no'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'name' => $request['name'],
                'email' => $request['email'],
                'duration' => $request['duration'],
                'additional' => $request['additional'],
                'price' => $request['price'],
                'contact' => $request['contact'],
                'room_type' => $request['room_type'],
                'status' => $request['status']
            ]);

            return response()->json([
                'message' => 'success'
            ]);
        }else{
            return response()->json([
                'message' => 'error'
            ]);
        }
    }
}
