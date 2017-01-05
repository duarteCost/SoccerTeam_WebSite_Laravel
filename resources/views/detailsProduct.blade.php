@extends('layouts.layout')
@section('header')
    <title>FC</title>

    <script type="text/javascript" src="{!! asset('/js/detailsProducts.js') !!}"> </script>
@stop
@section('content')
<div class = "content">
    <div class="title">
    @foreach($products as $produt)
    <h1>{{$produt->name}}</h1>
    @endforeach
    </div>
    <div class="produt">



    <link rel = "stylesheet" href = "/css/detailsProductsStyle.css" >




    @foreach($products as $produt)


            <div class="imagesContent">
                @php($aux=1)
            @foreach($array_urls[$produt->id] as $array_url)

                @if(!empty($array_url))
                    <div class="imageSlider">

                        <img class="mySlides" src="{{$array_url}}" style="width:100%">
                    </div>
                @endif

            @endforeach
            <div class="selctImage">
            @foreach($array_urls[$produt->id] as $array_url)
                    @if(!empty($array_url))

                    <div class="grid">
                        <img class="demo opacity-off" id="imgGrid{{$aux}}" src="{{$array_url}}" style="width:100%" onclick="currentDiv({{$aux}})" onmouseover="styleonmouseover('imgGrid{{$aux}}')" onmouseout="styleOnmouseout('imgGrid{{$aux}}')">
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



</div>
</div>
@stop
