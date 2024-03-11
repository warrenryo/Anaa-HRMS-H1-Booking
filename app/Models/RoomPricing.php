<?php

namespace App\Models;

use App\Models\RoomDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomPricing extends Model
{
    use HasFactory;

    protected $table = 'hrms_h1_room_pricing';

    protected $fillable = [
        'room_type_id',
        'three_hours',
        'six_hours',
        'tweleve_hours',
        'onedaystay',
    ];

    public function roomPrice(){
        return $this->belongsTo(RoomDetails::class, 'id', 'room_type_id');
    }
}
