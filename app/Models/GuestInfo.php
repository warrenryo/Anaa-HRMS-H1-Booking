<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuestInfo extends Model
{
    use HasFactory;
    protected $table = 'hrms_h1_guest_details';
    protected $fillable = [
        'user_id',
        'client_password',
        'adult_no',
        'child_no',
        'contact_no',
        'guest_id',
        'id_number',
        'room_type',
        'room_number',
        'room_service',
        'special_request',
        'per_stay',
        'checkin',
        'checkout',
        'price',
        'status'
    ];

    public function userInfo(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
