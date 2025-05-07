<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        //estamos passando a Class 'EventModel' q é a class q guarda nossas operações 
        //passaremso o metodo static 'all( )' onde com ele conseguiremos pegar todos eventos do banco
        $events = Event::all();

        return view('welcome', ['events' => $events]);
    }

    public function create()
    {
        // var_dump('oi');
        return view('event.create');
    }
}
