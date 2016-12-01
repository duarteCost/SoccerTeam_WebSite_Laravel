@extends('layouts.layout')
@section('header')
    <title>FC</title>
@stop
@section('content')

    <div class="NewsDetails">
        @foreach($news as $new)

            <h2 class="NewsDetails"> <a class="news">{{$new->title}}</a></h2>

                <br>
                <p2 class="NewsDetails">
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
