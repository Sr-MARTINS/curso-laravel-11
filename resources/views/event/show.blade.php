@extends('layouts.main')

@section('title', 'Pg Show')

@section('content')

    <div class="col-md-10 offset-md-1" >
        <div style="border: 1px solid; margin-top: 2.5rem; padding: 1rem;" class="row">

            <div class="col-md-6" 
            style="padding: 10px; display: flex; align-items: center ;border-radius: .4rem;justify-content: center; border: 1px solid grey; margin: 1rem auto;">

                <img src="/img/events/{{ $event->image }}" alt="image-da-pagina">
            </div>

            <div class="col-md-6">
                <h1> {{ $event->title }} </h1>
                <p><span style="font-weight: 700;">Local:</span> {{ $event->city }} </p>
                <p><span style="font-weight: 700;">Status:</span> {{ $event->status }} </p>
                <p><span style="font-weight: 700;">N Participantes:</span> X </p>
                <p><span style="font-weight: 700;">Dono do Evento:</span> X </p>

                <a href="" class="btn btn-primary">Confirmar Presença</a>
            </div>

            <div class="col-md-12">
                <h3>Sobre o Evento:</h3>    
                <p><span style="font-weight: 700;">Descrição:</span> {{ $event->description }} Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet, illum vitae blanditiis tempore totam dolorem a pariatur distinctio ut mollitia porro nam, voluptate eum? Eos illo consequuntur veritatis cumque consectetur.</p>
            </div>
        </div>
    </div>

@endsection