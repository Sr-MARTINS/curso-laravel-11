@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <h1>Algum titulo</h1>

    @if(5 > 10)
        <p>operação true</p>
    @endif

        <!-- inpresao de valor -->
    <p> {{ $nome }}</p>

        <!-- Condição -->
    @if ($nome  == "Pedro" )
    
        <p>Bem vindo, Pedro</p>
    @elseif ($nome == "Joao")

        <p>Seu nome é {{ $nome }} e vc tem {{ $idade }} anos</p>
    @else 
    
        <p>Seu nome não é Pedro</p>
    @endif

        <!-- Loop -->
    @for ($i = 0; $i < count($arr); $i++)
        <p> {{ $arr[$i] }} - {{ $i }}</p>
    @endfor

    @foreach ($nomes as $name)
            <!-- podemos pegar o indece do elemento -->
        <p> {{ $loop->index }}  </p>
        <p> {{ $name }}  </p>
    @endforeach

    <!-- comentario -->

    {{-- Comentario --}}

@endsection