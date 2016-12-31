@extends('layouts.layout')
@section('header')
    <title>FC</title>
@stop
@section('content')
<div class = "content">
    <div class="title">
    @foreach($products as $produt)
    <h1>{{$produt->name}}</h1>
    @endforeach
    </div>
    <div class="produt">
    <script>
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
                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
            }
            x[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " w3-opacity-off";
        }
    </script>



    <link rel = "stylesheet" href = "/css/detailsProductsStyle.css" >

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">





    @foreach($products as $produt)


            <div class="w3-content" style="max-width:500px">
                @php($aux=1)
            @foreach($array_urls[$produt->id] as $array_url)

                @if(!empty($array_url))

                        <img class="mySlides" src="{{$array_url}}" style="width:100%">
                @endif

            @endforeach
            <div class="w3-row-padding w3-section">
            @foreach($array_urls[$produt->id] as $array_url)
                    @if(!empty($array_url))

                    <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="{{$array_url}}" style="width:100%" onclick="currentDiv({{$aux}})">
                    </div>
                        @php($aux+=1)
                    @endif

            @endforeach
            </div>

        </div>


            <br>
        <div class="produt_submit">
            <p> Preço:{{$produt->price}}€</p>

            <form method="post" action="/products/add/ {{$produt->id}}">
                <div class="form-group">
                    <input type = "submit" class="input" name = "addBasket" value="Adicionar ao Carrinho">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <br>
            </form>
        </div>
    @endforeach

        <script>
            window.onload = function() {

                currentDiv('1');
            }

        </script>

</div>
</div>
@stop
