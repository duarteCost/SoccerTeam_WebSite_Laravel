@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/ticketsStyle.css" >




@stop
@section('content')
<div class = content>
    <div class="tickets">
    <h1>Tickets</h1>


      @foreach($awayTeams as $awayTeam)
          <div class="games">
          @foreach($homeTeams as $homeTeam)


                  @if($homeTeam->game_id == $awayTeam->game_id)
                        <div class="clubs">


                                @if(!empty($homeTeams_urls[$homeTeam->game_id][0]))
                                    <img class="games" src="{{$homeTeams_urls[$homeTeam->game_id][0]}}"/>

                                @endif

                                            {{$homeTeam->club_name}} VS {{$awayTeam->club_name}}

                                     @if(!empty($awayTeams_urls[$awayTeam->game_id][0]))
                                        <img class="games" src="{{$awayTeams_urls[$awayTeam->game_id][0]}}"/>

                                     @endif



                        </div>
                      <div class="date">
                          <p1>Date: {{$homeTeam->date}}</p1>
                      </div>
                      <div class="price">
                          <p2> {{$homeTeam->ticket_price}}€</p2>
                        <br>

                      <a href="/tickets/{{$homeTeam->game_id}}" class="button" >Comprar</a>
                      </div>
                          <br>

                @endif

        @endforeach
          </div>
    @endforeach




</div>
</div>
@stop
@section('footer')
@stop


