<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        return view('booking.about');
    }

    public function properties(){
        return view('booking.properties');
    }

   
    public function gallery(){
        return view('booking.gallery');
    }

    public function blogs(){
        return view('booking.blogs');
    }

    public function blogdetails(){
        return view('booking.blogdetails');
    }

    public function contact(){
        return view('booking.contact');
    }
}
