<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypesModel extends Model
{
    use HasFactory;
    
    protected $table = 'hrms_h1_room_types';
    protected $fillable = [
        'RoomTypeID',
        'RoomType',
        'Description',
        'MaxGuests',
    ];

    
}
