@extends('layouts.layout')
@section('header')
    <title>FC</title>
    <link rel = "stylesheet" href = "/css/homeStyle.css" >
    <script type="text/javascript" src="{!! asset('/js/home.js') !!}"> </script>
@stop
@section('content')

<div class = "contente">



    <div class="slider imagesContent container">
        @foreach($latest_news as $new)

            @if(!empty($array_urls_slider[$new->id][0]))

                <div class="mySlides">
                    <a class="newsImage" href="/detailsNews/{{$new->id}}">
                    <img class="mySlides1" src="{{$array_urls_slider[$new->id][0]}}" style="width:100%">
                    </a>
                    <div class="displayText ">
                        {{$new->title}}
                    </div>

                </div>
            @endif

        @endforeach
        <a class="slider buttonSliderLeft" onclick="plusDivs(-1)">&#10094;</a>
        <a class="slider buttonSliderRight right" onclick="plusDivs(1)">&#10095;</a>

    </div>



    <div class="home">



        <br><br>

    <ul class="flex-container">

        <li class="flex-item1">
            @php($aux=0)
            <h1>Ultimas notícias</h1>
            @foreach($latest_news as $new)

                @if($aux < 10)
                <div class="news">
                @if(!empty($array_urls[$new->id][0]))

                        <div class="newsImage">
                    <a class="newsImage" href="/detailsNews/{{$new->id}}">
                        <img class="newsImage" src="{{$array_urls[$new->id][0]}}"/>
                    </a>
                    </div>
                @endif
                    @if(!empty($new->title))

                        @php($aux+=1)

                    @endif
                <h2> <a class="news" href="/detailsNews/{{$new->id}}">{{$new->title}} {{$new->id}}</a></h2>

                    <br>
                    <p2>

                        <?php

                        $content = substr($new->content, 0, 200);  // returns "abcde"

                        echo " $content..."
                        ?>
                        <br><br>

                        {{$new->updated_at}}

                        {{$new->name}}
                    </p2>



                </div>
                @endif
            @endforeach
        </li>


        <li class="flex-item">

        <div class="table_ligue">
            <h3>Tabela da liga</h3>
            <table class="table_ligue">
                <thead>
                <tr>
                    <th>Cl</th>
                    <th> P</th>
                    <th>Equipa</th>
                    <th>PJ</th>
                    <th>V</th>
                    <th>E</th>
                    <th>D</th>
                </tr>
                </thead>
                <tbody>
                @foreach((json_decode($response)->standing) as $value)

                    @if (!empty($value->position))
                        <tr>
                            <td>{{$value->position}}</td>
                            @endif
                            @if (!empty($value->points))

                                <td>{{$value->points}}</td>

                            @endif
                            @if (!empty($value->teamName))

                                <td>{{$value->teamName}}</td>

                            @endif

                            @if (!empty($value->playedGames))

                                <td>{{$value->playedGames}}</td>

                            @endif
                            @if (!empty($value->wins))

                                <td>{{$value->wins}}</td>

                            @endif
                            @if (!empty($value->draws))

                                <td>{{$value->draws}}</td>

                            @endif
                            @if (!empty($value->losses))

                                <td>{{$value->losses}}</td>
                    @else(<td>{{0}}</td>)
                    @endif
                    <tr>

                @endforeach
                </tbody>
            </table>
        </div>
     
        <div class="results_table">
            <h3>Resultados</h3>
            <table class="results_table">
                <thead>
                <tr>

                        <th>Equipa da casa</th>
                        <th>G</th>
                    <th>G</th>
                    <th>Equipa</th>

                </tr>
                </thead>

                @php($SCHEDULED = 0)
                @foreach((json_decode($response_games)->fixtures) as $value)

                    @if ($value->status == "SCHEDULED")
                        @php($SCHEDULED++)

                        @if ($SCHEDULED == '1')
            </table>
            </div>
            <div class="results_table">
                <h3>  Próximos jogos </h3>
            <table class="results_table">

                <thead>


                            <tr>
                                    <th>Equipa da casa</th>
                                    <th></th>
                                <th></th>
                                <th>Equipa</th>

                            </tr>
                </thead>
                @php($aux =1)
                        @endif

                    @endif
                @if ($value->status == "FINISHED" || $SCHEDULED<6)

                         <tr>



                             <td class="line">
                     @if (!empty($value->homeTeamName))


                             {{$value->homeTeamName}}
                             @endif
                             </td><td class="line">

                             @if (!empty($value->result->goalsHomeTeam))

                                 {{$value->result->goalsHomeTeam}}

                             @endif
                             </td><td class="line">
                             @if (!empty($value->result->goalsAwayTeam))

                                 {{$value->result->goalsAwayTeam}}

                             @endif
                             </td>  <td class="line">
                             @if (!empty($value->awayTeamName))

                               {{$value->awayTeamName}}
                               
                             @endif
                             </td>
                    @if (!empty($value->date))
                        <tr> <td colspan="4" class="date line" > Date: {{$value->date}}</td> </tr>

                    @endif


                     <tr>

                    <td class="clear_line"> </td>
                     @endif

                 @endforeach

             </table>
         </div>
        </li>
    </ul>
    </div>
</div>
 @stop
