<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
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
    </body>
</html>
