@extends('layouts.main')

@section('title', 'Pg Show')

@section('content')

    <div class="col-md-10 offset-md-1" >
        <div style="border: 1px solid grey; margin-top: 2.5rem; padding: 1rem;" class="row">

            <div class="col-md-6" 
            style="height:320px;padding: 5px; display: flex; align-items: center ;border-radius: .4rem;justify-content: center; margin: 2rem 0 1rem 0; border: 1px solid grey;">

                <img src="/img/events/{{ $event->image }}" alt="image-da-pagina" style="width: 80%">
            </div>

            <div class="col-md-6">
                <h1 style="text-align: center;"> {{ $event->title }} </h1>
                <hr>
        
                <p class="mb-0 fw-medium">Local: {{ $event->city }} </p>
                <p class="mb-0 fw-medium">Status: {{ $event->status }} </p>
                <p class="mb-0 fw-medium">N Participantes: X </p>
                
                <p><span style="font-weight: 500;">
                    Dono do Evento: {{ $eventOwner['name']}}
                </span></p>
    
                <div style="margin-bottom: 9px;">
                    <h5>O evento conta com:</h5>
                        @foreach($event->items as $item)
                            <p style="margin-bottom: -1px;"><i class="bi bi-check-lg"></i>
                            {{ $item }} </p>
                        @endforeach
                </div>
            
                @if(!$hasUserJoined)
                    <form action="/events/join/{{ $event->id }}" method="POST">        
                        @csrf
                        <a href="/events/join/{{ $event->id}}" 
                            class="btn btn-primary"
                            onclick="event.preventDefault();
                            this.closest('form').submit()">
                            
                            Confirmar Presença
                        </a>
                    </form>
                @else
                    <p style="border:1px solid grey; padding: 10px 35px; border-radius: .5rem">Voçê esta participando deste evento</p>
                @endif
            </div>

            <div class="col-md-12">
                <h3>Sobre o Evento:</h3>    
                <p><span style="font-weight: 700;">Descrição:</span> {{ $event->description }}</p>
            </div>
        </div>
    </div>

@endsection