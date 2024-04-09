<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Reviews\ReviewModel;
use App\Http\Controllers\Controller;
use App\Models\BookingModel\Booking;

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
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }


    //REVIEWS 
    public function roomReviews()
    {
        $reviews = ReviewModel::all();

        return response()->json([
            'reviews' => $reviews
        ]);
    }

    public function updateStatus(Request $request)
    {
        $id = $request['id'];
        $update = ReviewModel::where('id', $id)->first();

        $update->update([
            'status' => $request['status']
        ]);
    }

    public function loyaltyUpdate(Request $request)
    {
        $email = $request['email'];

 
        $update_user = User::where('email', $email)->first();

        if ($update_user) {
            $vip = 'Yes';
            $update_user->update([
                'vip' => $vip
            ]);
       
            return response()->json([
                'message' => 'success'
            ]); 
        } else {
          
        }
    }

    public function plusPoints(Request $request){
        $points = $request['points'];
        $email = $request['email'];
        $voucher = $request['voucher'];
        $voucher_points = $request['v_points'];

        $user = User::where('email', $email)->first();
        if ($user) {
            // Calculate new points by adding booked room's points
            $newPoints = $user->points + $points;
    
            // Update the user's points
            $user->update([
                'points' => $newPoints
            ]);
            
    
            if($voucher == 'Yes'){
                $v_points = $user->points - $voucher_points;
    
                $user->update([
                    'points' => $v_points
                ]);
            }
            // Return a success response or do something else if needed
            return response()->json(['message' => 'Points updated successfully']);
        } else {
            // Return a failure response if user with given email is not found
            return response()->json(['error' => 'User not found'], 404);
        }


    }


    //LOYALTY USERS
    public function loyaltyUsers(){
        $users = User::where('vip', 'Yes')->get();

        return response()->json($users);
    }
}
