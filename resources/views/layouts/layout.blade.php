<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>User</title>

	<!-- Styles -->
	<link rel = "stylesheet" href = "/css/style.css" >
	<link rel = "stylesheet" href = "/css/app.css" >
	<script src="/js/app.js"></script>


</head>
<body>
@if (Route::has('login'))
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
				<a href="{{ url('/products') }}">Produtos</a>
			</li>
			<li>
				<a href="{{ url('/help') }}">Ajuda</a>
			</li>
			<li id = "exp">
				<a href="{{ url('/logout') }}"
				   onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
					Logout
				</a>

				<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</li>

			<li id = "exp">
				<a href="{{ url('/user') }}">{{ Auth::user()->name }}</a>
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
				<a href="{{ url('/products') }}">Produtos</a>
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
@endif
@yield('content')


</body>
</html>
