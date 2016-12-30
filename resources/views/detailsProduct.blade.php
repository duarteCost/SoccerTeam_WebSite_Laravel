@extends('layouts.layout')
@section('header')
    <title>FC</title>
@stop
@section('content')

    <h1>Produtos</h1>

    <link rel = "stylesheet" href = "/css/detailsProductsStyle.css" >

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






    @foreach($products as $produt)
        <div class = "produt">
            <div class="slider">
                @php($aux=0)
            @foreach($array_urls[$produt->id] as $array_url)

                @if(!empty($array_url))

                        <input type="radio" name="slide_switch" id="$aux"/>
                        <label for="$aux">
                            <img src="{{$array_url}}" width="20"/>
                        </label>
                        <img src="{{$array_url}}"/>
                        @php($aux+=1)
                @endif


            @endforeach
            </div>
            <h3> <a class="news" href="/detailsProduct/{{$produt->id}}">{{$produt->name}}</a></h3>

            <br>
            Preço:{{$produt->price}}€

            <form method="post" action="/products/add/ {{$produt->id}}">
                <div class="form-group">
                    <input type = "submit" class="input" name = "addBasket" value="Adicionar ao Carrinho">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
            </form>
        </div>
    @endforeach
@stop
@section('footer')
@stop
