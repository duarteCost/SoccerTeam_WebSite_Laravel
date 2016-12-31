@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/ticketsStyle.css" >
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">



@stop
@section('content')
<div class = content>
    <h1>Tickets</h1>
<div class="tickets">

      @foreach($awayTeams as $awayTeam)
          <div class="games">
          @foreach($homeTeams as $homeTeam)


                  @if($homeTeam->game_id == $awayTeam->game_id)

                        <h3> <a class="games" href="/tickets/{{$homeTeam->game_id}}">
                                @if(!empty($homeTeams_urls[$homeTeam->game_id][0]))
                                    <img class="games" src="{{$homeTeams_urls[$homeTeam->game_id][0]}}"/>

                                @endif

                                            {{$homeTeam->club_name}} VS {{$awayTeam->club_name}}

                                     @if(!empty($awayTeams_urls[$awayTeam->game_id][0]))
                                        <img class="games" src="{{$awayTeams_urls[$awayTeam->game_id][0]}}"/>

                                     @endif

                            </a></h3>
                      <div class="date">
                          <p1>Date: {{$homeTeam->date}}</p1>
                      </div>
                      <div class="price">
                          <p2>{{$homeTeam->ticket_price}}€</p2>
                        <br>

                      <a href="/tickets/{{$homeTeam->game_id}}" class="button" >Buy</a>
                      </div>
                          <br>

                @endif

        @endforeach
          </div>
    @endforeach



@stop
</div>
</div>
@section('footer')
@stop


