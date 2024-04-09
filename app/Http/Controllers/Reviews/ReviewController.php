<?php

namespace App\Http\Controllers\Reviews;

use Illuminate\Http\Request;
use App\Models\Reviews\ReviewModel;
use App\Http\Controllers\Controller;
use App\Models\RoomDetails;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function submitReview(Request $request, $id){
        $room_no = RoomDetails::find($id);
        $reviews = new ReviewModel;
        
        try {
            $status = 'Pending';
            $submit_review = $reviews->create([
                'room_id' => $id,
                'room_no'=> $room_no->RoomNumber,
                'name' => $request['name'],
                'how_room' => $request['room'],
                'how_service' => $request['service'],
                'reviews' => $request['reviews'],
                'status' => $status
            ]);
            if($submit_review){
                Alert::success('Thank you for sending us your reviews!', 'Your review has been send and waiting for approval.');
                return redirect()->back();
            }else{
                Alert::error('Something went wrong');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Something went wrong', $th->getMessage());
                return redirect()->back();
        }
    }
}
