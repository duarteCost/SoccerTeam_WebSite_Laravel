@extends('layouts.layout')
@section('header')
    <title>Produts FC</title>
@stop
@section('content')

	<h1>Produtos</h1>
	@foreach($produts as $produt)
	<div class = "produt">
	Nome:{{$produt->name}}
	<br>
	Preço:{{$produt->price}}
	</div>
	@endforeach
@stop
@section('footer')
@stop