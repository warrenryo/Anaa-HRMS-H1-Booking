<?php

namespace App\Models\BookingModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'hrms_h1_hotel_reserve';
    protected $fillable = [
        'reserve_code',
        'room_no',
        'start_date',
        'end_date',
        'name',
        'email',
        'duration',
        'additional',
        'price',
        'contact',
        'room_type',
        'status'
    ];
}
