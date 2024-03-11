<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomService extends Model
{
    use HasFactory;

    protected $table = 'hrms_h1_room_services';


    protected $fillable = [
        'RoomID',
        'ServiceName',
        'Description',
        'Price',
    ];
}
