@extends('layouts.app')
@section('header')
    <link rel = "stylesheet" href = "/css/loginStyle.css" >
    <title>Login</title>
@stop
@section('content')
    <div class = "container">
        <div class = "login">
            <h1>Login</h1>
            <form  role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <p><input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Email" required autofocus></p>

                @if ($errors->has('email'))
                    <legen class="loginLabel">
                        <strong>{{ $errors->first('email') }}</strong>
                    </legen>
                @endif
                <p><input id="password" type="password"  placeholder="Password" name="password" required></p>
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <p class="remember">
                    <label>
                        <input class="loginInput" type="checkbox" name="remember"> Remember Me
                    </label>
                </p>

                <p class = "submit"><input type="submit" value="Login"></p>

            </form>
        </div>

        <div class="login-help">
            <p>Esqueceu a sua Password
                <a href="{{ url('/password/reset') }}">
                    Forgot Your Password?
                </a>
            </p>
        </div>
    </div>
@endsection
