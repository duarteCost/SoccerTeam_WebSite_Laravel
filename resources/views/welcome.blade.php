@extends('layouts.layout')
@section('header')
    <title>FC</title>
    <link rel = "stylesheet" href = "/css/homeStyle.css" >
@stop
@section('content')
<div class = "contente">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <div class="slider w3-content w3-display-container">
        @foreach($latest_news as $new)

                @if(!empty($array_urls_slider[$new->id][0]))

        <div class="mySlides">
        <img class="mySlides1" src="{{$array_urls_slider[$new->id][0]}}" style="width:100%">

        <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
            {{$new->title}}
        </div>
        </div>
                @endif

        @endforeach
        <a class="slider w3-btn-floating w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
        <a class="slider w3-btn-floating w3-display-right" onclick="plusDivs(1)">&#10095;</a>
        <div class="slider" style="width:100%">
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        </div>
    </div>

    <script>

       // var myIndex = 0;
       // carousel();

        var slideIndex = 1;
       showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-white", "");
            }
            x[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " w3-white";

            setTimeout(setImage, 7000); // Change image every 2 seconds

        }


       function setImage() {
           slideIndex +=  1;
           showDivs(slideIndex);
       }



    </script>

    <div class="home">



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
    </div>
</div>
 @stop
