@extends('layouts.layout')
@section('header')
	<link rel = "stylesheet" href = "/css/productsStyle.css" >
    <title>Produts FC</title>
@stop
@section('content')
<div class = "content">


	<div class="produts">
	<h1>Produtos</h1>

	@foreach($products as $produt)
			<div class="item">

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

							<input type = "submit" onclick="clicked({{Auth::check()}});" class="input" name = "addBasket" value="Adicionar ao Carrinho">
							<input type="hidden" name="_token" value="{{csrf_token()}}">


							<script>

									function clicked(auth) {
										if(auth)
										{
											alert("Produto adicionado ao carrinho!\n")
										}
									}
							</script>


						</form>


					</div>

			</div>

	@endforeach
	</div>
</div>

@stop