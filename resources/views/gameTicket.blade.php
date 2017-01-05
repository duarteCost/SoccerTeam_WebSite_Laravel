@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/gamesStyle.css" >
    <script type="text/javascript" src="{!! asset('/js/gameTicket.js') !!}"> </script>
@stop
@section('content')
<div class = "content">

      @foreach($awayTeams as $awayTeam)
            <div class="games">
          @foreach($homeTeams as $homeTeam)


                  @if($homeTeam->game_id == $awayTeam->game_id)
                        <div class="clubs">

                             <h3> <a class="games" href="/tickets/{{$homeTeam->game_id}}">

                                @if(!empty($homeTeams_urls[$homeTeam->game_id][0]))
                                    <img class="games" src="{{$homeTeams_urls[$homeTeam->game_id][0]}}"/>
                                @endif

                                            {{$homeTeam->club_name}} VS {{$awayTeam->club_name}}

                                    @if(!empty($awayTeams_urls[$awayTeam->game_id][0]))
                                        <img class="games" src="{{$awayTeams_urls[$awayTeam->game_id][0]}}"/>

                                     @endif

                                 </a></h3>
                          <br>
                        </div>
                        <div class="date">
                            <p1>Date: {{$homeTeam->date}}</p1>
                        </div>

                        @php($price=$awayTeam->ticket_price)
                        @php($quantityZonaA=$awayTeam->zone_a)
                        @php($quantityZonaB=$awayTeam->zone_b)
                        @php($quantityZonaC=$awayTeam->zone_c)
                        @php($quantityZonaD=$awayTeam->zone_d)
                @endif

        @endforeach
    @endforeach
            </div>


    <script>
        // Quando inicia
        window.onload = function() {

            toSvg('stadiumMap', '{{$quantityZonaA}}', '{{$quantityZonaB}}', '{{$quantityZonaC}}', '{{$quantityZonaD}}');

        }
    </script>



        <div class="form">
            <!-- botoes Quantidade, Zona, Confirmação -->
          <a href="javascript:toggleMe('quantityDiv', '{{$quantityZonaA}}', '{{$quantityZonaB}}', '{{$quantityZonaC}}', '{{$quantityZonaD}}');" class="button" >Quantidade</a>
          <a href="javascript:toggleMe('stadiumZoneDiv', '{{$quantityZonaA}}', '{{$quantityZonaB}}', '{{$quantityZonaC}}', '{{$quantityZonaD}}');" id ="buttonZone" class="button"  >Zona</a>
          <a href="javascript:toggleMe('confirmDiv', '{{$quantityZonaA}}', '{{$quantityZonaB}}', '{{$quantityZonaC}}', '{{$quantityZonaD}}');" id ="confirmTicket" class="button">Confirmação</a>





            <!-- formulario do ticket -->
            <form method="post" action="/tickets/{{$awayTeam->game_id}}/addBasket">
                <div id="quantityDiv" >
                    <br>
                    Quantidade:
                    <input type="number" id="quantity" name="quantity" min="1" max="5000">

                </div>
                <br>

                <div class="styled-select green semi-square" id="stadiumZoneDiv"  style="display:none">

                    <!-- imagem mapa -->
                    <map name="stadiumMap" id="stadiumMap">

                        <area  shape="poly" title="adsfr"  id="lnk883" coords="342,355,365,349,381,347,401,345,423,343,448,342,456,342,461,301,310,295,309,299,256,296,294,327">


                        <area shape="poly" title="adsfr"  coords="388,468,360,459,327,450,286,435,261,419,250,405,248,394,255,383,279,374,293,367,311,360,239,324,242,315,216,291,131,279,114,265,1,229,3,477,187,496,288,488,349,479" >
                        <area shape="poly" title="adsfr"   coords="502,342,535,344,566,346,589,347,611,351,680,291,594,297,498,301" >
                        <area shape="poly" title="adsfr"  coords="569,464,705,488,956,473,955,218,892,244,799,265,684,286,613,348,640,352,674,363,704,377,711,397,702,414,675,431,633,446">
                    </map>

                    <select id="stadiumZone" name="zone" onchange="report(this.value)">
                        <option id="zone_null"> </option>
                        <option id="zone_a" value="zone_a">Zona A</option>
                        <option id="zone_b" value="zone_b">Zona B</option>
                        <option id="zone_c" value="zone_c">Zona C</option>
                        <option id="zone_d" value="zone_d">Zona D</option>
                    </select>

                </div>
                <br>

                <div id="confirmDiv"  style="display:none">

                    <p id="quantityConfirm"></p>
                    <p id="zoneConfirm"></p>
                    <p >Preço: {{$price}}€
                    </p>

                    <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">


                   <p class="next"> <input  onclick="clicked();" class="next" type="submit"></p>

                </div>
            </form>



            <!-- div da imagem do estadio tintada -->
            <div   class="stadium" id="mekan" style="display:none"> </div>





            <!-- Botoes seguinte -->
            <div class="next" id="next1">

             <a href="javascript:toggleMe('stadiumZoneDiv' ,'{{$quantityZonaA}}', '{{$quantityZonaB}}', '{{$quantityZonaC}}', '{{$quantityZonaD}}');"  class="button">Seguinte</a>
            </div>

            <div class="next" id="next2" style="display:none">
                    <a href="javascript:toggleMe('confirmDiv', '{{$quantityZonaA}}', '{{$quantityZonaB}}', '{{$quantityZonaC}}', '{{$quantityZonaD}}');"  class="button" >Seguinte</a>
            </div>

        </div>
</div>
@stop

