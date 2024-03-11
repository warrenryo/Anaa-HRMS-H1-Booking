<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenitiesModel extends Model
{
    use HasFactory;


    protected $table= 'hrms_h1_amenities';
    protected $fillable = [
        'AmenityName',
        'Description',
    ];

}
