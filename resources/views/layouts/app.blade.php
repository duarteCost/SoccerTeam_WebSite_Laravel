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
                <div class = "nav">
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
                </div>
            @else
                <div class = "nav">
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
                </div>
            @endif
    @endif
    @yield('content')
    @yield('footer')
    <div class = "footer">
        <p id = "p_foot"> Acompanhenos atraves de redes sociais ou partilhe videos do seu clube em: </p>
        <a class="foot" href="https://www.facebook.com/RealMadrid/"> <img id="fb" src="https://s3.amazonaws.com/acr20162017/footer/fb_full_pic.png"/></a>
        <a class="foot" href="https://twitter.com/realmadrid"> <img id="twt" src="https://s3.amazonaws.com/acr20162017/footer/Twitter-logo-1.jpg"/></a>
        <a class="foot" href="https://www.youtube.com/user/realmadridcf"> <img id="yt" src="https://s3.amazonaws.com/acr20162017/footer/youT_full_pic.jpg"/></a>
    </div>
</body>
</html>
