<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('layouts.main');
    }

    public function create()
    {
        // var_dump('oi');
        return view('event.create');
    }
}
