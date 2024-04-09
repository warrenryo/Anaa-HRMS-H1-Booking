<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VIPController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        $user_details = User::where('email', $user->email)->get();
        $booking_details = Http::get('https://h4-billpay-pos.anaa-hrms.com/api/booking-details');
        $booking_data = $booking_details->json();

        $email = $user->email;

        $booking_details = array_filter($booking_data, function($booking) use ($email){
            return $booking['email'] === $email;
        });

        return view('VIP.profile_index', compact('booking_details', 'user'));
    }

    public function getLoyalty(){
        return view('VIP.get_loyalty');
    }
}
