@extends('layouts.layout')
@section('header')
    <title>FC</title>
@stop
@section('content')

    <div class="NewsDetails">
        @foreach($news as $new)

            @if(!empty($array_urls[$new->id][0]))


                <img class="detailsNew" src="{{$array_urls[$new->id][0]}}"/>


            @endif


            <h2 class="NewsDetails"> <a class="news">{{$new->title}}</a></h2>

                <br>
                <p2 class="NewsDetails">
                    {{$new->content}}
                    <br><br>

                    {{$new->updated_at}}

                    {{$new->name}}
                </p2>






    @if(!empty($array_urls[$new->id][1]))

        @foreach($array_urls[$new->id] as $array_url)
            @if(!empty($array_url) &&  ($array_url != $array_urls[$new->id][0]))

                            <a>  <img class="galeryImages" src="{{$array_url}}"/></a>

            @endif


        @endforeach



    @endif
    @endforeach

    </div>



@stop
@section('footer')
@stop
