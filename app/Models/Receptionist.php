<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'hrms_h1_receptionist';
    protected $fillable = [
        'FirstName', 'LastName', 'Email', 'Phone', 'Password',
    ];

    protected $hidden = [
        'Password', 'remember_token',
    ];
}
