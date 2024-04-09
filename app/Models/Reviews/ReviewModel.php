<?php

namespace App\Models\Reviews;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    use HasFactory;
    protected $table = 'hrms_r4_reviews';
    protected $fillable = [
        'room_id',
        'room_no',
        'name',
        'how_room',
        'how_service',
        'reviews',
        'status'
    ];
}
