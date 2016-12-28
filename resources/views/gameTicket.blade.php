@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/gamesStyle.css" >

@stop
@section('content')

    <ul class="flex-container">
      @foreach($awayTeams as $awayTeam)
          @foreach($homeTeams as $homeTeam)


                  @if($homeTeam->game_id == $awayTeam->game_id)
                    <div class="games">
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
                @endif

        @endforeach
    @endforeach

        <div class="form">

          <a href="javascript:toggleMe('1', '2' ,'3' , 'mekan' , '1');" class="button" >Quantity</a>
          <a href="javascript:toggleMe('1', '2', '3' ,'mekan' , '2');" class="button"  >Zone</a>
          <a href="javascript:toggleMe('1', '2', '3' ,'mekan' , '3');"  class="button">Confirm</a>

            <script type="text/javascript">
                function toggleMe(b, c, d , f,  id_view ){


                    var r=document.getElementById(b);
                    var e=document.getElementById(c);
                    var t=document.getElementById(d);
                    var g=document.getElementById(f);
                    var view =document.getElementById(id_view);



                    if(view == r){
                        e.style.display="none";
                        t.style.display="none";
                        r.style.display="block";
                        g.style.display="none";
                    }
                    if(view == e){
                        r.style.display="none";
                        t.style.display="none";
                        e.style.display="block";
                        g.style.display="block";
                    }
                    if(view == t){

                        r.style.display="none";
                        e.style.display="none";
                        t.style.display="block";
                        g.style.display="none";
                    }



                    return true;
                }

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
                            t+=  '<polyline points="'+c+'" fill="red" id="'+b+'" onmouseover="renkli(this.id)" />';
                        }


                    }
                    t+='</svg>';
                    var el= document.getElementById('mekan');
                    el.innerHTML = t ;

                }



                function select(zone) {
                    document.getElementById(zone).selected = "true";
                }
            </script>


          <form method="post" action="/tickets/{{$awayTeam->game_id}}/addBasket">
              <div id="1" >
              Quantity:
              <input type="number" name="quantity" min="1" max="5000">

              </div>
              <br>

              <div class="styled-select green semi-square" id="2"  style="display:none">


                  <map name="planetmap" id="planetmap">
                      <area shape="poly" onclick="javascript:select('zone_a');" coords="342,355,365,349,381,347,401,345,423,343,448,342,456,342,461,301,310,295,309,299,256,296,294,327" alt="Sun"  >
                      <area shape="poly" onclick="javascript:select('zone_a');" coords="388,468,360,459,327,450,286,435,261,419,250,405,248,394,255,383,279,374,293,367,311,360,239,324,242,315,216,291,131,279,114,265,1,229,3,477,187,496,288,488,349,479" ">
                      <area shape="poly" onclick="javascript:select('zone_a');" coords="502,342,535,344,566,346,589,347,611,351,680,291,594,297,498,301" alt="Venus" href="venus.htm">
                  </map>

                  <select name="zone">
                      <option id="zone_a" value="zone_a">Zona A</option>
                      <option id="zone_b" value="zone_b">Zona B</option>
                      <option id="zone_c" value="zone_c">Zona C</option>
                      <option id="zone_d" value="zone_d">Zona D</option>
                  </select>


              </div>
              <br>

              <div id="3"  style="display:none">
              <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit">

              </div>
          </form>






            <button onclick="select('zone_a')">Try it</button>

            <div id="mekan" style="display:none"></div>



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



            </script>






        </div>

        </li>
    </ul>


@stop
@section('footer')
@stop

