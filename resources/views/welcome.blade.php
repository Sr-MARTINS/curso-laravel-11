@extends('layouts.main')

@section('title', 'HD Events')

@section('content')

    <div class="container" > 
        <div class="mx-auto mt-5 text-center" style="max-width: 800px;">
                <!-- div para logo -->
            <div>
                <h1>Buscar um evento</h1>

                <form class="d-flex" action="/" style="width: 500px; margin: 2rem auto">
                    <input class="form-control me-2" type="search" name="search" placeholder="Procurar Evento" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div style="max-width: 1000px; margin: auto">
            
            <div style="margin:3rem 0 1rem 1.4rem">
                @if($search)
                    <h2>Buscando por: {{ $search }} </h2>
                    <a href="/">Voltar para lista de envento</a>
                @else
                    <h2>Proximos Eventos</h2>
                    <p>Veja os eventos dos proximos dias</p>
                @endif    
            </div>

            <div class="d-flex flex-wrap justify-content-evenly">
                @foreach($events as $event)
                    <div class="card mb-3" style="width: 27%; height: 21rem;">

                        <div class="d-flex align-items-center mx-auto my-1 p-2 rounded border" style="width: 211px; height:131px ; border-color: #ccd6dfa1; border-radius: 2.5%;">

                            <img src="/img/events/{{ $event->image }}" alt="logo-do-card"  style="width: 59%; margin:auto;">
                        </div>

                        <div class="card-body">
                            <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                            <h4 class="card-title">{{ $event->title }}</h4>
                            <p class="card-participantes">X Participantes</p>

                            <a href="/events/{{ $event->id}}" class="btn btn-primary">Saber mais</a>
                        </div>
                    </div>

                @endforeach
                @if(count($events) == 0 && $search)
                    <p>Nao foi possivel encontrar nenhum evento com: " {{ $search }} " </p>
                    <a href="/"> Ver todos</a>
                
                @elseif(count($events) == 0)
                    <p>Nao a evento desponivel</p>
                @endif

            </div>
            
        </div>
    </div>
    

@endsection