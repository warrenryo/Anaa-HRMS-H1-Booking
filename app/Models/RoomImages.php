<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImages extends Model
{
    use HasFactory;
    protected $table = 'hrms_h1_room_image';
    protected $fillable = [
        'room_types_id',
        'images'
    ];
}
