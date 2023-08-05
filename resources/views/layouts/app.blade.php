<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Locadora de Carros'}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <head>
        <!-- Other meta tags and CSS links -->
        <script src="https://kit.fontawesome.com/cecfd4c125.js" crossorigin="anonymous"></script>
    </head>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm bg-primary text-light">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ 'Locadora de Carros' }}
                </a>
                <button class="navbar-toggler  bg-light "
             type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"  style="color: red;"
                   ></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                        <li class="nav-item text-light">
                            <a href="{{ route('clientes') }}" class="nav-link text-light">
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('locacoes')}}" class="nav-link text-light">
                                Locações
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link
                            dropdown-toggle text-light" data-bs-toggle="dropdown">
                                Veículos
                            </a>
                            <div class="dropdown-menu bg-primary">
                                <!-- <a href="{{ route('carros') }}" class="dropdown-item text-light" style="hover: {bg}">Carros</a> -->
                                <a href="{{ route('carros') }}" class="dropdown-item text-light" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor=''; this.style.color='';">Carros</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('marcas') }}" class="dropdown-item text-light" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor=''; this.style.color='';">Marcas</a>
                                <a href="{{ route('modelos') }}" class="dropdown-item text-light" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor=''; this.style.color='';">Modelos</a>
                            </div>

                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">Entrar</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">Cadastrar-se</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown  text-light">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end bg-primary" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-light" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor=''; this.style.color='';" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>