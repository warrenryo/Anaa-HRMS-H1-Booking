<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Services extends Controller
{
    public function serve(){
        return view('frontdesk.services');
    }
}
