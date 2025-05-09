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
        return view('event.create');
    }

    public function store(Request $request)
    {
        $event = new Event();

        $event->title       = $request->title;

        $event->date        = $request->date;

        $event->description = $request->description;
        $event->city        = $request->city;
        $event->private     = $request->private;

        $event->items       = $request->items;


            // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

                //Estamos armazenando em "$resquestImage" o arquivo q foi enviado pela requisição com o nome de "image"
            $requestImage = $request->image;

                //ultilizando o metodo 'extensio()' vamos pegar o formato, ou melhor a extenção 
                // ( .jpg , .png ) 
            $extension = $requestImage->extension();

                //Passaremos dentro do "md5()" o '$requestImage->getClientOriginalName()' junto o strtotime("now"), ou seja estamos concatenando o nome q foi pego pelo getClientOriginalName, com o timestamp da hr q o arquivo foi pego
                
                // concatenando os dois do "md5" estamos fazerndo uma emcriptação do nome do arquivo com 36 caracteres para q nao tenhamos conflito com os nomes da img ao salvarmos elas
                
                //Depois concatenarem o "md5" com o "$extensio" para q possamos adcionar o tipo do aquivo para a img q queremos salvar
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension;

                //Aq estamos movendo a img para a pasta "img/events" q foi gerada
                // Ultilizando o "pulic_path" consigeremos acessar todo o caminho para a pasta public do Laravel
            $request->image->move(public_path('img/events'), $imageName);

                // Salvaremos  o nome da img no atributo "image" do modelo $event, para q ele possa ser armazenado no bando de dados
            $event->image = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }

    public function show($id) 
    {
        $event = Event::findOrfail($id);

        return view('event/show', ['event' => $event]);
    }
}
