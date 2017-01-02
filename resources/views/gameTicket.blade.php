@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/gamesStyle.css" >

@stop
@section('content')
<div class = "content">
    <ul class="flex-container">
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
                          <br>
                        <div class="date">
                            <p1>Date: {{$homeTeam->date}}</p1>
                        </div>
                      @php($price=$awayTeam->ticket_price)
                @endif

        @endforeach
    @endforeach
            </div>

        <div class="form">

          <a href="javascript:toggleMe('1', '2' ,'3' , 'mekan' , '1');" class="button" >Quantidade</a>
          <a href="javascript:toggleMe('1', '2', '3' ,'mekan' , '2');" id ="buttonZone" class="button"  >Zone</a>
          <a href="javascript:toggleMe('1', '2', '3' ,'mekan' , '3');" id ="confirmTicket" class="button">Confirmação</a>



            <script type="text/javascript">
                function toggleMe(b, c, d , f,  id_view ){


                    var r=document.getElementById(b);
                    var viewZone=document.getElementById(c);
                    var t=document.getElementById(d);
                    var g=document.getElementById(f);
                    var view =document.getElementById(id_view);


                    var quantity = document.getElementById("quantity").value;
                    var aux_zone = document.getElementById("stadiumZone");
                    var zoneStadium = aux_zone.options[aux_zone.selectedIndex].value;




                    if(view == r){
                        document.getElementById("next1").style.display="block";
                        document.getElementById("next2").style.display="none";
                        viewZone.style.display="none";
                        t.style.display="none";
                        r.style.display="block";
                        g.style.display="none";
                    }

                    if(view == viewZone  && (isNaN(quantity) ||   quantity > 0)){
                        document.getElementById("next1").style.display="none";
                        document.getElementById("next2").style.display="block";
                        document.getElementById("buttonZone").style.opacity = 1;
                        viewZone.style.opacity = 1;
                        r.style.display="none";
                        t.style.display="none";
                        viewZone.style.display="block";
                        g.style.display="block";
                    }
                    else if (view == viewZone  && (!isNaN(quantity) || quantity < 0))
                    {alert("Zona invalida, selecione uma zona valida");}

                    if(view == t && (isNaN(quantity) ||   quantity > 0) && (zoneStadium !='')){
                        document.getElementById("next1").style.display="none";
                        document.getElementById("next2").style.display="none";
                        document.getElementById("quantityConfirm").innerHTML="Quantidade:"+quantity;

                        switch(zoneStadium) {
                            case "zone_a":
                                document.getElementById("zoneConfirm").innerHTML = "Zona: Zona A";
                                break;
                            case "zone_b":
                                document.getElementById("zoneConfirm").innerHTML = "Zona: Zona B";
                                break;
                            case "zone_c":
                                document.getElementById("zoneConfirm").innerHTML = "Zona: Zona C";
                                break;
                            case "zone_d":
                                document.getElementById("zoneConfirm").innerHTML = "Zona: Zona D";
                                break;
                        }
                        r.style.display="none";
                        viewZone.style.display="none";
                        t.style.display="block";
                        g.style.display="none";
                    }else if(view == t && (zoneStadium =='')){alert("Zona invalida, selecione uma zona valida");}
                    else if(view == t && (!isNaN(quantity) || quantity < 0)){alert("Quantidade invalida, insira um numero de bilhetes valido ");}



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
                            t+=  '<polyline points="'+c+'" opacity = "0" id="'+b+'" onmouseover="renkli(this.id)" onmouseout="styleOnmouseout(this.id)" onclick="selectZone(this.id)" />';
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
                    <br>
                    Quantidade:
                    <input type="number" id="quantity" name="quantity" min="1" max="5000">

                </div>
                <br>

                <div class="styled-select green semi-square" id="2"  style="display:none">


                    <map name="planetmap" id="planetmap">

                        <area  shape="poly" title="adsfr"  id="lnk883" coords="342,355,365,349,381,347,401,345,423,343,448,342,456,342,461,301,310,295,309,299,256,296,294,327" alt="Sun"  onmouseover="writeText('sdsd60')">


                        <area shape="poly" title="adsfr"  coords="388,468,360,459,327,450,286,435,261,419,250,405,248,394,255,383,279,374,293,367,311,360,239,324,242,315,216,291,131,279,114,265,1,229,3,477,187,496,288,488,349,479" >
                        <area shape="poly" title="adsfr"   coords="502,342,535,344,566,346,589,347,611,351,680,291,594,297,498,301" alt="Venus" >
                        <area shape="poly" title="adsfr"  coords="569,464,705,488,956,473,955,218,892,244,799,265,684,286,613,348,640,352,674,363,704,377,711,397,702,414,675,431,633,446">
                    </map>

                    <select id="stadiumZone" name="zone" onchange="report(this.value)">
                        <option> </option>
                        <option id="zone_a" value="zone_a">Zona A</option>
                        <option id="zone_b" value="zone_b">Zona B</option>
                        <option id="zone_c" value="zone_c">Zona C</option>
                        <option id="zone_d" value="zone_d">Zona D</option>
                    </select>

                </div>
                <br>

                <div id="3"  style="display:none">

                    <p id="quantityConfirm"></p>
                    <p id="zoneConfirm"></p>
                    <p >Preço: {{$price}}€
                    </p>

                    <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">


                   <p class="next"> <input class="next" type="submit"></p>

                </div>
            </form>










            <div   class="stadium" id="mekan" style="display:none"> </div>








            <script type="text/javascript">

                var i=0;
                function renkli(ad){
                    //alert(ad);
                    var myElement= document.getElementById(ad);
                    //el.setAttribute('fill',A[i]);
                    myElement.style.opacity = 0.5;
                    myElement.style.fill = "green";



                    document.getElementById("lnk883").write("ToolTip");
                    //myElement.style.opacity = 0;
                }

                function styleOnmouseout(ad){
                    var aux_zone = document.getElementById("stadiumZone");
                    var zoneStadium = aux_zone.options[aux_zone.selectedIndex].value;

                        report(zoneStadium);


                }

                function selectZone(ad){
                    var myElement= document.getElementById(ad);
                    //el.setAttribute('fill',A[i]);

                    if(ad == "poly0")
                    {
                        select('zone_b');
                    }
                    if(ad == "poly1")
                    {
                        select('zone_a');
                    }
                    if(ad == "poly2")
                    {
                        select('zone_c');
                    }
                    if(ad == "poly3")
                    {
                        select('zone_d');
                    }
                }

                function report(ad) {

                    var myPoly0= document.getElementById('poly0');
                    var myPoly1= document.getElementById('poly1');
                    var myPoly2= document.getElementById('poly2');
                    var myPoly3= document.getElementById('poly3');

                    myPoly0.style.opacity = 0;
                    myPoly1.style.opacity = 0;
                    myPoly2.style.opacity = 0;
                    myPoly3.style.opacity = 0;
                    if(ad == "zone_a")
                    {
                        myPoly1.style.opacity = 0.5;
                        myPoly1.style.fill = "green";

                    }

                     if(ad == "zone_b")
                    {
                        myPoly0.style.opacity = 0.5;
                        myPoly0.style.fill = "green";
                       ;

                    }
                     if(ad == "zone_c")
                    {
                        myPoly2.style.opacity = 0.5;
                        myPoly2.style.fill = "green";

                    }
                    if(ad == "zone_d") {
                        myPoly3.style.opacity = 0.5;
                        myPoly3.style.fill = "green";
                    }

                }

            </script>

            <div class="next" id="next1">

             <a href="javascript:toggleMe('1', '2', '3' ,'mekan' , '2');"  class="button">Seguinte</a>
            </div>

            <div class="next" id="next2" style="display:none">
                    <a href="javascript:toggleMe('1', '2', '3' ,'mekan' , '3');"  class="button" >Seguinte</a>
            </div>


    </ul>

</div>
@stop

