<?php

namespace App\Models;

use App\Models\RoomImages;
use App\Models\RoomPricing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomDetails extends Model
{
    use HasFactory;

    protected $table = 'hrms_h1_room_types';

    protected $fillable = [
        'RoomNumber',
        'RoomTypeID',
        'RoomType',
        'RoomStatus',
        'MaxGuests',
        'Description'
    ];

    public function roomImages(){
        return $this->hasMany(RoomImages::class, 'room_types_id' , 'id');
    }

    public function roomPrice(){
        return $this->hasOne(RoomPricing::class, 'room_type_id', 'id');
    }
}
