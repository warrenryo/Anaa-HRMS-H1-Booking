<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookTemplate extends Controller
{
    public function sample(){
        return view('booking.home');
    }
}
