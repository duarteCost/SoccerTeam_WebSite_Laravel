@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/detailsNewsStyle.css" >
    <title>FC</title>
@stop
@section('content')
    @foreach($news as $new)
    <h1> {{$new->title}}</h1>
    @endforeach
    <div class="NewsDetails">
        @foreach($news as $new)

            @if(!empty($array_urls[$new->id][0]))

                <div class="imgNewsDetails">
                <img class="detailsNew" src="{{$array_urls[$new->id][0]}}"/>
                </div>

            @endif




                <br>
                <p2 class="NewsDetails">
                    {{$new->content}}
                    <br><br>

                    {{$new->updated_at}}

                    {{$new->name}}
                </p2>



    @endforeach

    </div>



@stop
@section('footer')
@stop
