<?php

namespace App\Http\Controllers;

use App\Models\RoomModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class FrontdeskController extends Controller
{
    public function index(){

        return view('frontdesk.frontdeskIndex');
    
    }

    public function createFrontdesk(Request $request){
    
        $room = new RoomModel;

        try {
            
            $create_room = $room->create([
                'rm_type' => $request['frontdesk']
            ]);

            if($create_room){
            Alert ::success('Sucess!','Added successfully');
            return redirect()->back();

            }
            
                else{
                    Alert::error('Error','something went wrong');
                    return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error',$th->getMessage());
            return redirect()->back();
        }

    }
}

