@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <!-- Dashboard essa q ira imprimir os eventos do usuario logado  -->

    <div class="col-md-10 offset-md-1 dashboard title-container" style="margin:3rem auto 0 auto">
        <h1> Meus Eventos </h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard events-container" style="margin-bottom:3rem">
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
                            <td>{{ count($event->users) }}</td>
                            <td>
                                <a href="/events/edit/{{ $event->id }}">
                                    <i class="bi bi-pencil-square" style="color: black;"></i>
                                </a> /

                                <!-- Passando como um formulario para enviar pela rota a chamada do nosso metodo de deletar
                                 Adetiomos "action="/events/{{ $event->id }}"" Pois estamos pegando o id para mandar para o arquivo de Route-->
                                <form action="/events/{{ $event->id }}" method="POST" style="display:inline-block">
                                    <!-- passamdo a diretiva "@csrf" pois é uma forma de proteção q o Laravel pede, e tbm passamos a diretiva "@method('DELETE')" com o valor de delete pois queremos informar q o real metodo dele é de deletar  -->
                                    @csrf
                                    @method('DELETE')
                                    <i type="submit" class="bi bi-trash"></i> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p>Voce ainda nao tem evendo, <a href="/events/create">Criar Evento</a></p>
    
        @endif
    </div>

    <div class="col-md-10 offset-md-1 dashboard events-container" style="margin: 0 auto 1rem auto">
        <h1>Eventos que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard events-container">
        @if(count($eventsAsParticipant) > 0)
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
                    @foreach($eventsAsParticipant as $event)
                        <tr>
                            <td scope="col"> {{ $loop->index + 1 }}</td>
                            <td><a href="/events/{{ $event->id }}"> {{ $event->title }} </a> </td>
                            <td>{{ count($event->users) }}</td>
                            <td>
                                <form action="/events/leave/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                        
                                    <i type="submit" class="bi bi-trash"></i> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
             <p>Voce ainda nao esta participando de nenhum evento, <a href="/"> Participe de um evento </a></p>
        @endif
@endsection