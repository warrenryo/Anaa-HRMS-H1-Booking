<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use App\Models\RoomDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;

class BookClientController extends Controller
{
    public function addClient(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $client_code = mt_rand(10000, 99999);
        if($this->userCode($client_code)){
            $client_code = mt_rand(10000, 99999);
        }

        
        $role = 'Guest';
        $client = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'contact_no' => $request->contact_no,
            'room_no' => $request->room_no,
            'password' => Hash::make($request->password),
            'user_code' => $client_code
        ]);

        event(new Registered($client));
        Alert::success('Success!', 'Client has been assigned on Room '.$client->room_no.'');
        return redirect()->back();
    }

  

    public function submitAssignedRoom(Request $request){
        $client_code = mt_rand(10000, 99999);
        if($this->userCode($client_code)){
            $client_code = mt_rand(10000, 99999);
        }
        
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('hrms_users', 'email'),
            ],
            'total_amount' => [
                'required',
            ]
            // Other validation rules for other fields...
        ]);

        $role = 'Guest';
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $name = $firstname . ' ' . $lastname;
        $status = 'Active';
        $i = 1;
        $pass = $client_code.$lastname.$i++;

        
        $client = User::create([
            'name' => $name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($pass),
            'user_code' => $client_code
        ]);
        event(new Registered($client));
        if($client){
            $client->guestInfo()->create([
                'user_id' => $client->id,
                'client_password' => $pass,
                'adult_no' => $request->adult_no,
                'child_no' => $request->child_no,
                'contact_no' => $request->contact_no,
                'guest_id' => $request->guest_id,
                'id_number' => $request->id_number,
                'room_type' => $request->room_type,
                'room_number' => $request->room_no,
                'room_service' => json_encode($request->special_request),
                'special_request' => $request->additional_request,
                'per_stay' => $request->per_stay,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
                'price' => $request->total_amount,
                'status' => $status
            ]);
            $update_room = RoomDetails::where('RoomNumber', $request->room_no)->first();
            if ($update_room) {
                $newStatus = 'Occupied';
            
                $update_room->update([
                    'RoomStatus' => $newStatus
                ]);
                Alert::success('Success!', '');
                return redirect()->back();
                
            } else {
                return redirect()->back();
            }
            
        }else{
            return redirect()->back();
        }
       
    }

    public function userCode($client_code){
        return User::whereUserCode($client_code);
    }
    
}
