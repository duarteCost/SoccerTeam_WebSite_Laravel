@extends('layouts.layout')
@section('header')
	<link rel = "stylesheet" href = "/css/productsStyle.css" >
    <title>Produts FC</title>
@stop
@section('content')

	<h1>Produtos</h1>

	@foreach($products as $produt)
		<div class = "produt">
		@if(!empty($array_urls[$produt->id][0]))

				<a class="produts" href="/detailsProduct/{{$produt->id}}">
			<img class="produts" src="{{$array_urls[$produt->id][0]}}"/>
					</a>


		@endif
			<h3> <a class="produts" href="/detailsProduct/{{$produt->id}}">{{$produt->name}}</a></h3>

	<br>
	Preço:{{$produt->price}}€

	<form method="post" action="/products/add/{{$produt->id}}">
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