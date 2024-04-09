<?php

namespace App\Http\Controllers;

use App\Models\RoomDetails;
use Illuminate\Http\Request;
use App\Models\HousekeepingRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HousekeepingController extends Controller
{
    public function housekeeping(Request $request){
        $rooms = RoomDetails::where('RoomStatus', 'Dirty')->get();
        $requests = HousekeepingRequest::when($request['filter_status'] != null, function($q) use($request){
            return $q->where('status', $request['filter_status'])->orderBy('id','DESC');
        })->orderBy('id', 'DESC')->paginate(10);

        return view('housekeeping.housekeepingIndex', compact('rooms', 'requests'));
    }

    public function submitHousekeeping(Request $request){
        $hrequest = new HousekeepingRequest;

        if($request['room_no'] == null){
            $request->validate([
                'room_no' => 'required'
            ]);
            return redirect()->back();
        }

        $status = 'Pending';

        $request_code = mt_rand(10000,99999);
        if($this->requestCode($request_code)){
            $request_code = mt_rand(10000,99999);
        }

        try{
            $hrequest->request_code = $request_code;
            $hrequest->room_no = $request['room_no'];

            if($request['housekeeping_request'] == null){
                $hrequest->housekeeping_request = json_encode(['No Request']);
            }else{
                $hrequest->housekeeping_request = json_encode($request['housekeeping_request']);
            }

            if($request['items_services'] == null){
                $hrequest->items_services = json_encode(['No Request']);
            }else{
                $hrequest->items_services = json_encode($request['items_services']);
            }

            $hrequest->additional_request = $request['additional_request'];
            $hrequest->time_issue = $request['time_issue'];
            $hrequest->status = $status;
            $hrequest->save();

            if($hrequest){


                Alert::success('Success!', 'Your request has been submitted.');
            
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong, please try again later.');
            }
        }catch(\Exception $e){
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function requestCode($request_code){
        return HousekeepingRequest::whereRequestCode($request_code);
    }
}
