<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	        <style>
            html, body {
                background-color: #afd9ee;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                width: 100%;
                position: absolute;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }


            .m-b-md {
                margin-bottom: 30px;
            }

            ul {
                width:100%;
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

			.produt{
				width: 42%;
				float: left;
				margin-top:5%;
				margin-left:8%;
			}

            /* Change the link color to #111 (black) on hover */
            li a:hover {
                background-color: #111;
            }
            #exp{
                float:right;
            }

        </style>
    @yield('header')
</head>
<body>
	@yield('navbar')
		@if (Route::has('login'))
			<div class="top-right links">
				@if (Auth::check())
					<ul>
						<li>
							<a href="{{ url('/') }}">HOME</a>
						</li>
						<li>
							<a href="{{ url('/about') }}">QUEM SOMOS</a>
						</li>
						<li>
							<a href="{{ url('/news') }}">Notícias</a>
						</li>
						<li>
							<a href="{{ url('/produts') }}">Produtos</a>
						</li>
						<li>
							<a href="{{ url('/help') }}">Ajuda</a>
						</li>
						<li id = "exp">
							<a href="{{ url('/user') }}">Sua Página</a>
						</li>
					</ul>
				@else
					<ul>
						<li>
							<a href="{{ url('/') }}">HOME</a>
						</li>
						<li>
							<a href="{{ url('/about') }}">QUEM SOMOS</a>
						</li>
						<li>
							<a href="{{ url('/news') }}">Notícias</a>
						</li>
						<li>
							<a href="{{ url('/produts') }}">Produtos</a>
						</li>
						<li>
							<a href="{{ url('/help') }}">Ajuda</a>
						</li>
						<li id = "exp">
							<a href="{{ url('/login') }}">Login</a>
						</li>
						<li id = "exp">
							<a href="{{ url('/register') }}">Register</a>
						</li>
					</ul>
					<br>
					<br>
				@endif
			</div>
		@endif
	@yield('content')
	@yield('footer')
</body>
</html>