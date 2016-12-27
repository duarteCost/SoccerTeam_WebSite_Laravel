@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/ticketsStyle.css" >

@stop
@section('content')

    <ul class="flex-container">
      @foreach($awayTeams as $awayTeam)
          @foreach($homeTeams as $homeTeam)


                  @if($homeTeam->game_id == $awayTeam->game_id)
                    <li class="flex-item1">
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
                    </li>
                @endif

        @endforeach
    @endforeach




          <form method="post" action="/tickets/{{$awayTeam->game_id}}/addBasket">
              Quantity:
              <input type="number" name="$quantity" min="1" max="5000">
              <br>

              <div class="styled-select green semi-square">
                  <select name="zone">
                      <option value="zona_A">Zona A</option>
                      <option value="zona_B">Zona B</option>
                      <option value="zona_C">Zona C</option>
                      <option value="zona_D">Zona D</option>
                  </select>

              </div>
              <br>

              <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit">
          </form>







        <li>


            <script type="text/javascript">
                var A = ["green","red","yellow"];
                var i=0;
                function renkli(ad){
                    //alert(ad);
                    var el= document.getElementById(ad);
                    //el.setAttribute('fill',A[i]);
                    el.style.fill=A[i];
                    i++;
                    if(i>2){i=0;}
                }
                /*
                 http://www.w3schools.com/svg/svg_circle.asp
                 http://www.w3schools.com/svg/svg_rect.asp
                 http://www.w3schools.com/jsref/prop_area_coords.asp
                 http://www.w3schools.com/jsref/prop_area_shape.asp
                 http://www.howtocreate.co.uk/tutorials/html/imagemaps
                 */


            </script>


            <map name="planetmap" id="planetmap">
                <area shape="poly" coords="342,355,365,349,381,347,401,345,423,343,448,342,456,342,461,301,310,295,309,299,256,296,294,327" alt="Sun" href="" onmouseover="toSvg(ad)" onmouseout="">
                <area shape="poly"  coords="388,468,360,459,327,450,286,435,261,419,250,405,248,394,255,383,279,374,293,367,311,360,239,324,242,315,216,291,131,279,114,265,1,229,3,477,187,496,288,488,349,479" alt="Mercury" href="mercur.htm">
                <area shape="poly" coords="502,342,535,344,566,346,589,347,611,351,680,291,594,297,498,301" alt="Venus" href="venus.htm">
            </map>

            <script type="text/javascript">
                window.onload = function() {

                    toSvg('planetmap');

                }


                function toSvg(ad){
                    var m, a, t,s,b, c, cc;
                    m = document.getElementById(ad);
                    a = m.getElementsByTagName('area');
                    t='<svg class="uzay">';
                    // alert(a.length);
                    //alert(a[0].getAttribute('shape'));


                    for(var i=0; i<a.length; i++) {
                        s = a[i].getAttribute('shape');
                        c = a[i].getAttribute('coords');
                        b= s+i;





                        if(s == 'poly') {
                            t+=  '<polyline points="'+c+'" fill="red" id="'+b+'" onmouseover="renkli(this.id)"/>';
                        }


                    }
                    t+='</svg>';
                    var el= document.getElementById('mekan');
                    el.innerHTML = t + 'click  circle and rect';

                }
            </script><br>

            <div id="mekan"></div>


        </li>
    </ul>


@stop
@section('footer')
@stop

