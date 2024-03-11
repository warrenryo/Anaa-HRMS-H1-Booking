<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function index()
{
    $events = [
        '2023-02-01' => ['Event 1', 'Event 2'],
        '2023-02-15' => ['Event 3'],
        // Add more events as needed
    ];

    return view('appoint', compact('events'));
}
}
