<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link rel = "stylesheet" href = "/css/navbar.css" >
    <script src="/js/app.js"></script>
    @yield('header')


</head>
<body>
    @if (Route::has('login'))
            @if (Auth::check())
                <ul class="navbar">

                    <li class="navbar">


                        <a class = "navbar" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/about') }}">QUEM SOMOS</a>
                    </li>
                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/news') }}">Notícias</a>
                    </li>
                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/products/all') }}">Produtos</a>
                    </li>
                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/help') }}">Ajuda</a>
                    </li>
                    <li id = "exp">
                        <a class = "navbar" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                    <li id = "exp">
                        <a class = "navbar" href="{{ url('/user') }}">{{ Auth::user()->name }}</a>
                    </li>
                </ul>
            @else
                <ul class="navbar">

                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/about') }}">QUEM SOMOS</a>
                    </li>
                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/news') }}">Notícias</a>
                    </li>
                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/products/all') }}">Produtos</a>
                    </li>
                    <li class="navbar">
                        <a class = "navbar" href="{{ url('/help') }}">Ajuda</a>
                    </li>
                    <li id = "exp">
                        <a class = "navbar" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li id = "exp">
                        <a class = "navbar" href="{{ url('/register') }}">Registar-se</a>
                    </li>
                </ul>
                <br>
                <br>
            @endif
    @endif
    @yield('content')


</body>
</html>
