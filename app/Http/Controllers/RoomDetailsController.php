<?php

namespace App\Http\Controllers;

use App\Models\RoomImages;
use App\Models\RoomDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class RoomDetailsController extends Controller
{
    public function roomDetailsIndex(Request $request){
        $room = RoomDetails::when($request['filter_status'] != null, function($q) use($request){
            return $q->where('RoomStatus', $request['filter_status'])->orderBy('id','DESC');
        })->orderBy('id', 'DESC')->paginate(10);;
        return view('roomDetails.roomDetailsIndex', compact('room'));
    }

    public function addRoomDetails(Request $request){
        $room = new RoomDetails;

        $roomID = mt_rand(10000, 99999);
        if($this->roomCode($roomID)){
            $roomID = mt_rand(10000, 99999);
        }

        $room_status = 'Vacant';
        try {
            $validatedData = $request->validate([
                'room_number' => 'required',
                'room_type' => 'required',
                'max_guests' => 'required|numeric',
                'description' => 'required',
                '3h' => 'required|numeric',
                '6h' => 'required|numeric',
                '12h' => 'required|numeric',
                '24h' => 'required|numeric',
            ]);
            $add_room = $room->create([
                'RoomNumber' => $validatedData['room_number'],
                'RoomTypeID'=> $roomID,
                'RoomType' => $validatedData['room_type'],
                'RoomStatus' => $room_status,
                'MaxGuests' => $validatedData['max_guests'],
                'Description' => $validatedData['description']
            ]);

            if($add_room){
                $add_room->roomPrice()->create([
                    'room_type_id' => $add_room->id,
                    'three_hours' => $validatedData['3h'],
                    'six_hours' => $validatedData['6h'],
                    'tweleve_hours' => $validatedData['12h'],
                    'onedaystay' => $validatedData['24h'],
                ]);

                //Http::post('http://192.168.101.72:8000/api/add-room-details', [
                 //   'RoomNumber' => $validatedData['room_number'],
                 //   'RoomTypeID'=> $roomID,
                 //   'RoomType' => $validatedData['room_type'],
                 //   'RoomStatus' => $room_status,
                 //   'MaxGuests' => $validatedData['max_guests'],
                 //   'Description' => $validatedData['description']
                //]);
            }

            if($request->hasFile('images')){
                $uploadPath = 'uploads/roomImages/';

                $i = 1;
                foreach($request->file('images') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath, $fileName);
                    $finalImagePathName = $uploadPath.$fileName;

                    $add_room->roomImages()->create([
                        'room_types_id' => $add_room->id,
                        'images' => $finalImagePathName
                    ]);
                }
            }
            Alert::success('Success', 'Room Added Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function roomCode($roomID){
        return RoomDetails::whereRoomCode($roomID);
    }

    public function viewRoomImages($id){
        $room_id = RoomDetails::find($id);

        return view('roomDetails.viewRoomImages', compact('room_id'));

    }


    //EDIT ROOM
    public function edtiRoomDetails($id){
        $room = RoomDetails::find($id);

        return view('roomDetails.editRoomDetails', compact('room'));
    }

    public function deleteImage($id){
        $image = RoomImages::find($id);
        
        if(File::exists($image->images)){
            File::delete($image->images);
        }

        $image->delete();
        Alert::success('Success', 'The image has been deleted');
        return redirect()->back();
    }

    public function updateRoomDetails($id, Request $request){
        $room = RoomDetails::find($id);


        $room_status = 'Vacant';
        try {
            $validatedData = $request->validate([
                'room_number' => 'required',
                'room_type' => 'required',
                'max_guests' => 'required|numeric',
                'description' => 'required',
                '3h' => 'required|numeric',
                '6h' => 'required|numeric',
                '12h' => 'required|numeric',
                '24h' => 'required|numeric',
            ]);
            $add_room = $room->update([
                'RoomNumber' => $validatedData['room_number'],
                'RoomTypeID'=> $room->RoomTypeID,
                'RoomType' => $validatedData['room_type'],
                'RoomStatus' => $room_status,
                'MaxGuests' => $validatedData['max_guests'],
                'Description' => $validatedData['description']
            ]);

            if($add_room){
                //Http::post('http://192.168.101.72:8000/api/update-room-details',[
                 //   'RoomNumber' => $validatedData['room_number'],
                //    'RoomTypeID'=> $room->RoomTypeID,
                //    'RoomType' => $validatedData['room_type'],
                //    'RoomStatus' => $room_status,
                //    'MaxGuests' => $validatedData['max_guests'],
                //    'Description' => $validatedData['description']
              //  ]);
            }

            $room->roomPrice()->update([
                    'room_type_id' => $room->id,
                    'three_hours' => $validatedData['3h'],
                    'six_hours' => $validatedData['6h'],
                    'tweleve_hours' => $validatedData['12h'],
                    'onedaystay' => $validatedData['24h'],
                ]);
            

            if($request->hasFile('images')){
                $uploadPath = 'uploads/roomImages/';

                $i = 1;
                foreach($request->file('images') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath, $fileName);
                    $finalImagePathName = $uploadPath.$fileName;

                    $room->roomImages()->create([
                        'room_types_id' => $room->id,
                        'images' => $finalImagePathName
                    ]);
                }
            }
            Alert::success('Success', 'Room Added Successfully');
            return redirect('room-details');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function updateRoomStatus(Request $request, $id, $type_id){
        $status = RoomDetails::find($id);

        if($status){
            $update_status = $status->update([
                'RoomStatus' => $request['room_status']
            ]);
            
            if($update_status){
                //Http::post('http://192.168.101.72:8000/api/update-status',[
                 //   'id' => $id,
                 //   'RoomStatus' => $status->RoomStatus,
                 //   'RoomType' => $type_id
               // ]); 
                Alert::success('Success', 'Room Status has been updated');
                return redirect()->back();
            }else{
                Alert::error('Error', 'Something went wrong');
                return redirect()->back();
            }
        }else{
            Alert::error('Error', 'Something went wrong');
            return redirect()->back();
        }
    }

    public function deleteRoomDetails($id){
        $room = RoomDetails::find($id);
        
        try {
            if($room){
                if($room->roomImages){
                    foreach($room->roomImages as $image){
                        if(File::exists($image->images)){
                            File::delete($image->images);
                        }
                    }
                }
                $room->delete();
                //Http::post('http://192.168.101.72:8000/api/delete-room-details',[
               //     'RoomTypeID' => $room->RoomTypeID
               // ]);
                Alert::success('Success', 'Room '.$room->RoomTypeID. ' has been completely remove');
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
