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
	<form method="post" action="/products/{{$produt->id}}">
		<div class="form-group">
			<input type = "submit" class="input" name = "addBasket" value="Adicionar ao Carrinho">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
		</div>
	</form>
	@endforeach
@stop
@section('footer')
@stop