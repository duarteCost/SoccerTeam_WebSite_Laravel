@extends('layouts.layout')
@section('header')
    <title>Sobre FC</title>
@stop
@section('content')
    <h1>News</h1>
    @foreach($latest_news as $new)
        <div class="newsView">
        @if(!empty($array_urls[$new->id][0]))


            <img class="lastedNews" src="{{$array_urls[$new->id][0]}}"/>


        @endif

        <h2> <a class="news" href="/detailsNews/{{$new->id}}">{{$new->title}} {{$new->id}}</a></h2>

            <br>
            <p2>
                {{$new->content}}
                <br><br>

                {{$new->updated_at}}

                {{$new->name}}
            </p2>



        </div>
    @endforeach





@stop
@section('footer')
@stop