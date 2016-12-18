@extends('layouts.layout')
@section('header')
    <title>FC</title>
    <link rel = "stylesheet" href = "/css/homeStyle.css" >
@stop
@section('content')



    <img src="https://s3.amazonaws.com/acr20162017/s3files/images/imagemP.jpg"/>
        <br><br> <br><br>

    <ul class="flex-container">

        <li class="flex-item1">


            @foreach($latest_news as $new)
                <br><br>
                <div class="news">
                @if(!empty($array_urls[$new->id][0]))


                    <a class="news" href="/detailsNews/{{$new->id}}">
                        <img class="news" src="{{$array_urls[$new->id][0]}}"/>
                    </a>
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
            @endforeach
        </li>

        <li class="flex-item">
        <div class="table_ligue">
            <table class="table_ligue">

                <tr>
                        <th>Cl</th>
                        <th>P</th>
                        <th>Equipa</th>
                    <th>PJ</th>
                    <th>V</th>
                    <th>E</th>
                    <th>D</th>
                </tr>

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

            </table>
</div>

        <div class="results_table">
            <table class="results_table">

                <tr>
                        <th>Data</th>
                        <th>Equipa da casa</th>
                        <th>G</th>
                    <th>G</th>
                    <th>Equipa</th>

                </tr>
                @php($SCHEDULED = 0)
                @foreach((json_decode($response_games)->fixtures) as $value)

                    @if ($value->status == "SCHEDULED")
                        @php($SCHEDULED++)

                        @if ($SCHEDULED == '1')
                            <tr> <th colspan="5">Proximos jogos </th>  </tr>
                            <tr>
                                    <th>Data</th>
                                    <th>Equipa da casa</th>
                                    <th>G</th>
                                <th>G</th>
                                <th>Equipa</th>

                            </tr>

                        @endif

                    @endif
                @if ($value->status == "FINISHED" || $SCHEDULED<3)

                         <tr>
                             <td>
                     @if (!empty($value->date))
                         {{$value->date}}
                     @endif
                             </td>
                             <td>
                     @if (!empty($value->homeTeamName))

                             {{$value->homeTeamName}}
                             @endif
                             </td><td>
                             @if (!empty($value->result->goalsHomeTeam))

                                 {{$value->result->goalsHomeTeam}}

                             @endif
                             </td><td>
                             @if (!empty($value->result->goalsAwayTeam))

                                 {{$value->result->goalsAwayTeam}}

                             @endif
                             </td>  <td>
                             @if (!empty($value->awayTeamName))

                               {{$value->awayTeamName}}

                             @endif
                             </td>
                     <tr>
                     @endif

                 @endforeach

             </table>
         </div>
        </li>
 </ul>

 @stop
 @section('footer')
 @stop
