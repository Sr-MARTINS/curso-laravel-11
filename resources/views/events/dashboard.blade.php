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
                                <a href="/events/edit/{{ $event->id }}">Editar</a> /

                                <!-- Passando como um formulario para enviar pela rota a chamada do nosso metodo de deletar
                                 Adetiomos "action="/events/{{ $event->id }}"" Pois estamos pegando o id para mandar para o arquivo de Route-->
                                <form action="/events/{{ $event->id }}" method="POST" style="display:inline-block">
                                    <!-- passamdo a diretiva "@csrf" pois é uma forma de proteção q o Laravel pede, e tbm passamos a diretiva "@method('DELETE')" com o valor de delete pois queremos informar q o real metodo dele é de deletar  -->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"> Excluir </button>
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

@endsection