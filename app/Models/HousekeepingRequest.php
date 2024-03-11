<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingRequest extends Model
{
    use HasFactory;
    protected $table = 'hrms_h1_housekeeping_request';
    protected $fillable = [
        'request_code',
        'room_no',
        'housekeeping_request',
        'items_services',
        'additional_request',
        'time_issue',
        'status'
    ];
}
