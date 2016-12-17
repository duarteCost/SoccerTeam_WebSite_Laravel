@extends('layouts.app')
@section('header')
    <link rel = "stylesheet" href = "/css/registerStyle.css" >
    <title>Registar-se</title>
@stop
@section('content')
    <div class="container">
        <div class = "register">
            <h1>Registar-se</h1>
            <form  role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <label>Nome:</label><br>
                <p><input id="name" type="text"  name="name" value="{{ old('name') }}" placeholder="Nome" required autofocus></p>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <label>Email:</label><br>
                <p><input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Endereço de Email" required></p>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <label>Password:</label><br>
                <p></p><input id="password" type="password"  name="password" placeholder="Password" required></p>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <label>Confirmação da Password:</label><br>
                <input id="password-confirm" type="password"  name="password_confirmation" placeholder="Confirmação da Password" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
                <p class="submit"><input type="submit"  value = "Registar"></p>
            </form>
        </div>
    </div>
@endsection
