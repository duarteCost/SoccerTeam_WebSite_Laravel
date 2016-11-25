@extends('layouts.layout')
@section('content')

    @if($user->type)
        <h1>Página de Administrador</h1>
        <br>
        <form method="post" action="/user/deleteProduct">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Eliminar Produto</legend>

                    @foreach($products as $product)
                        @if($product->user_id ==$user->id)
                            <input type = "checkbox" id = "che" name = "{{$product->id}}" value = "{{$product->name}}">
                            {{$product->id}}
                            {{$product->name}}
                            <br>
                        @endif
                    @endforeach

                    @if(1==1)
                        <input type = "submit" name = "deleteSocio" value="Eliminar">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @endif

                </fieldset>
             </div>
        </form>
        <br>

        <form method="post" action="/user/addProduct/{{$user->id}}">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Adicionar Produto</legend>
                    <label class="text">Nome:</label><input type="text", name="productName", class="input">
                    <br>
                    <label class="text">Preço:</label><input type="text", name="productPrice", class="input">
                    <br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit", name="submitProduct", class="input" value="Adicionar Produto">
                </fieldset>
            </div>

        </form>
        <br>

        <form method="post" action="/user/deleteSocio">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Eliminar Socio</legend>
                    @foreach($users as $user)
                        @if(!$user->type)
                            <input type = "checkbox" id = "che" name = "{{$user->id}}" value = "{{$user->name}}">
                            {{$user->id}}
                            {{$user->name}}
                            <br>
                        @endif
                     @endforeach
                    @if(1==1)
                        <input type = "submit" name = "deleteSocio" value="Eliminar">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @endif
                </fieldset>
            </div>
         </form>

    @else
         <h1>Página de Socio</h1>

    @endif

@endsection
