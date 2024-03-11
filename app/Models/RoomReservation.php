<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    use HasFactory;

    protected $table = 'hrms_h1_room_reservations';

    protected $fillable = [
        'RoomID',
        'CheckInDate',
        'CheckOutDate',
        'GuestName',
        'ContactInfo',
        'TotalAmount',
    ];

}
