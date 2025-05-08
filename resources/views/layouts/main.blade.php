<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <script>
        setTimeout(function() {
            document.getElementById('msg').style.display = 'none';
        }, 5000); 
    </script>

</head>
<body>
    <header>
        <nav class="nav">
            <a class="nav-link active" aria-current="page" href="/">Eventos</a>
            <a class="nav-link" href="/events/create">Criar Eventos</a>
            <a class="nav-link" href="#">Entrar</a>
            <a class="nav-link disabled" aria-disabled="true">Cadastrar</a>
        </nav>
    </header>
    <div class="row">
        @if(session('msg'))
            
            <p id="msg">{{ session('msg' )}}</p>
        @endif
            @yield('content')
    </div>

    <footer>
        Footer pg &copy; 2025.
    </footer>



<script type="módulo" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script> 
</body>
</html>