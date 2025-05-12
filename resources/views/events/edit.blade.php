@extends('layouts.main')

@section('title', 'Editar Evente:' .$event->title)

@section('content')

    <div class="container">
        <div class="text-center mx-auto my-4" style="margin:1.3rem  auto">
            <h1>Editar {{ $event->title }}</h1>
        </div>
        <div class="mx-auto p-4 ps-5 rounded" style="max-width: 870px; border: 1px solid rgba(211, 211, 211, 0.4);">    
                                        
                <!-- Necessario usar o "multipart/form-date" é nescesario para enviar arquivo pelo formulario -->
            <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data" style="width:670px">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Image do Evento:</label>
                    <input class="form-control-file" name="image" type="file">
                </div>

                <div style="width: 100%; height:200px;margin: 1rem auto">
                    <img src="/img/events/{{ $event->image }}" alt="previu-img" style="width:30%; border:1px solid black; padding:20px">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Evento:</label>
                    <input class="form-control" name="title" type="text" placeholder="Evento" 
                        value="{{ $event->title }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputDate" class="form-label">Data:</label>
                    <input class="form-control" name="date" type="date" placeholder="Date"
                        value="{{ date('Y-m-d', strtotime($event->date)) }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cidade:</label>
                    <input class="form-control" name="city" type="text"placeholder="Evento"
                        value="{{ $event->city }}">
                </div>
                <div class="mb-3" style="width: 200px;">
                    <label for="exampleInputEmail1" class="form-label">Status do evento:</label> 
                    <select name="private" class="form-control">
                        <option value="0">Publico</option>
                        <option value="1" {{ $event->private == 1 ? "selected='selected'" : ""}}>Privado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descrição:</label>
                    <textarea class="form-control" name="description" placeholder="O que vai acontecer no evento ?"> {{ $event->description }} </textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Adicione itens de infraestrutura:</label>
                   <div class="form-goup">
                        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                   </div>
                   <div class="form-goup">
                        <input type="checkbox" name="items[]" value="Bebidas"> Bebidas
                   </div>
                   <div class="form-goup">
                        <input type="checkbox" name="items[]" value="Open Food"> Open Food
                   </div>
                   <div class="form-goup">
                        <input type="checkbox" name="items[]" value="Brinds"> Brinds
                   </div>
                </div>

                <button type="submit" class="btn btn-primary">Editar Evento</button>
            </form>
        </div>
    </div>

@endsection 