@extends('layouts.main')

@section('title', 'HD Events')

@section('content')

    <div class="container" > 
        <div class="mx-auto mt-5 text-center" style="max-width: 800px;">
                <!-- div para logo -->
            <div>
                <h1>Buscar um evento</h1>

                <form class="d-flex" style="width: 500px; margin: 2rem auto">
                    <input class="form-control me-2" type="search" placeholder="Procurar Evento" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div style="max-width: 800px;">
            
            <div style="margin:3rem 0 1rem 1.4rem">
                <h2>Proximos Eventos</h2>
                <p>Veja os eventos dos proximos dias</p>
            </div>

            <div style="display:flex; margin:auto">
                @foreach($events as $event)
                    <div class="card col-md-3" style="margin:10px">
                        <img src="/img/logoCards.jpg" alt="logo-do-card" style="padding: 5px;">

                        <div class="card-body">
                            <p class="card-date">10/10/2010</p>
                            <h4 class="card-title"> {{ $event->title }} </h4>
                            <p class="card-participantes">  X Partifipantes </p>

                            <a href="" class="btn btn-primary">Saber mais</a>
                        </div>
                    </div>   
                @endforeach
            </div>
        </div>
    </div>
    

@endsection