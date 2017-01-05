@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/detailsNewsStyle.css" >
    <title>FC</title>
@stop
@section('content')
<div class = "content">
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
                <p2 class="NewsDetails" id="1">
                    {!!$new->content!!}
                    <script>
                        document.getElementById("1").innerHTML="{!!$new->content!!}";
                    </script>

                </p2>
                <br><br>
                    {{$new->updated_at}}

                    {{$new->name}}


    @endforeach
    </div>
</div>
@stop