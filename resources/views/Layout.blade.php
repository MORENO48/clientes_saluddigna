<html>
    <head>
        <title>App Name - @yield('title')</title>
        @yield('encabezado')
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">   
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" style="background-color:#2CBB73 !important;">
            <img src="{{ asset('public/img/salud-digna.png') }}" height="50">

            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <strong>Clientes</strong>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('clientes.index' )}}">Lista de Clientes</a>
                        <a class="dropdown-item" href="{{ route('clientes.create' )}}">Agregar Cliente</a>
                    </div>
                </li>
            </ul>
          </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
        @yield('js')
        <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(500);
        </script>
    </body>
</html>