@extends('layouts.layout')
@section('header')
    <title>Sobre FC</title>
@stop
@section('content')
    <h1>News</h1>
    @foreach($news as $new)

        <h2>{{$new->title}}</h2>
        <div>
        {{$new->content}}
        <br>

        {{$new->updated_at}}

        {{$new->user_id}}
        </div>

    @endforeach
    <?php $image="10000.png"; ?>
    <img src="/images/$image">
    <a href="#">{{ HTML::image("/images/<?php echo $image;?>", "Logo") }}</a>
    <img src="{{ asset('/images/10000.png') }}" />





@stop
@section('footer')
@stop