@extends('layouts.layout')
@section('header')
    <title>FC</title>
@stop
@section('content')
    <div class="flex-center position-ref full-height">
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
    </div>

    
@stop
@section('footer')
@stop