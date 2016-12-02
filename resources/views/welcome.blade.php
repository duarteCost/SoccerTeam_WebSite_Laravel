@extends('layouts.layout')
@section('header')
    <title>FC</title>
@stop
@section('content')

    <div class="lastNews">

    <img src="https://s3.amazonaws.com/acr20162017/s3files/images/imagemP.jpg"/>
        <br><br> <br><br>


        @foreach($latest_news as $new)

            @if(!empty($array_urls[$new->id][0]))


                        <img class="lastedNews" src="{{$array_urls[$new->id][0]}}"/>


            @endif

            <h2> <a class="news" href="/detailsNews/{{$new->id}}">{{$new->title}} {{$new->id}}</a></h2>
            <div class="news">
                <br>
                <p2>
                    <?php

                    $content = substr($new->content, 0, 200);  // returns "abcde"

                    echo " $content..."
                    ?>
                    <br><br>

                    {{$new->updated_at}}

                    {{$new->name}}
                </p2>


    </div>
    </div>
    @endforeach

@stop
@section('footer')
@stop
