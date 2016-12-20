@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/ticketsStyle.css" >

@stop
@section('content')
    @foreach($games as $game)




            <h3> <a class="gaames" href="/tickets/{{$game->club_name}}">{{$game->club_name}}</a></h3<br>



    @endforeach
@stop
@section('footer')
@stop

