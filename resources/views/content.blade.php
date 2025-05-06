@extends('layouts.main')

@section('title', 'Pg content')

@section('content')
    <h1>Pagina de contato</h1>

    <a href="/"> Voltar para pg</a>
    
@endsection


@if($busca != '')
        <!-- Pegando valor passado na variavel -->
    <p>Buscando por: {{ $busca }}</p>
@endif