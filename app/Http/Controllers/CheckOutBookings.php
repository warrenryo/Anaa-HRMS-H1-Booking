<?php

namespace App\Http\Controllers;

use App\Models\GuestInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomDetails;
use RealRashid\SweetAlert\Facades\Alert;

class CheckOutBookings extends Controller
{
    public function index(){
        $active_bookings = GuestInfo::where('status', 'Checked-out')->get();
        return view('frontdesk.checkout', compact('active_bookings'));
    }


    public function checkout($id){
        $guest = GuestInfo::find($id);
        
        try {
            if($guest){
                $new_status = 'Checked-out';
                $guest->update([
                    'status' => $new_status
                ]);

                $new_room_status = 'Checkout';
                $update_room = RoomDetails::where('RoomNumber', $guest->room_number)->first();
                $update_room->update([
                    'RoomStatus' => $new_room_status
                ]);
                Alert::success('Success', 'Guest has been successfully checked-out');
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
           Alert::error('Error', $th->getMessage());
           return redirect()->back();
        }
    }
}
