@extends('layouts.layout')
@section('header')
	<link rel = "stylesheet" href = "/css/productsStyle.css" >
    <title>Produts FC</title>
@stop
@section('content')
<div class = "content">
	<h1>Produtos</h1>
	<div class="box">
	@foreach($products as $produt)
			<div class="item">
				<div class="inner">
					<div class="image">
									@if(!empty($array_urls[$produt->id][0]))

											<a class="produts" href="/detailsProduct/{{$produt->id}}">

												<img class="produts" src="{{$array_urls[$produt->id][0]}}"/>
											</a>
									@endif

					</div>
					<div class="produtContent">
												<h3> <a class="produts" href="/detailsProduct/{{$produt->id}}">{{$produt->name}}</a></h3>


												<p>Preço:{{$produt->price}}€</p>

										<form  class="produts" method="post" action="/products/add/{{$produt->id}}">

												<input type = "submit" class="input" name = "addBasket" value="Adicionar ao Carrinho">
												<input type="hidden" name="_token" value="{{csrf_token()}}">


										</form>

					</div>
				</div>
			</div>

	@endforeach
	</div>
</div>
@stop