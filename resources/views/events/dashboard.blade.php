@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <!-- Dashboard essa q ira imprimir os eventos do usuario logado  -->

    <div class="col-md-10 offset-md-1 dashboard title-container">
        <h1> Meus Eventos </h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard events-container">
        @if(count($event) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($event as $event)
                        <tr>
                                <!-- Esse "$loop->index + 1" é pra nosso campo de contagem nao ficar vazio e sim fazer a contaem automatica -->
                            <td scope="col"> {{ $loop->index + 1 }}</td>
                            <td><a href="/events/{{ $event->id }}"> {{ $event->title }} </a> </td>
                            <td>0</td>
                            <td>
                                <a href="">Editar</a> /
                                <a href="">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p>Voce ainda nao tem evendo, <a href="/events/create">Criar Evento</a></p>
    
        @endif
    </div>

@endsection