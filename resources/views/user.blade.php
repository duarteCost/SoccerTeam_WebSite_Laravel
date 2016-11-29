@extends('layouts.layout')
@section('content')

    @if($user->type)
        <h1>Página de Administrador</h1>
        <br>
        <form method="post" action="/user/addProduct/{{$user->id}}">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Adicionar Produto</legend>
                    <label class="text">Nome:</label><br><input type="text", name="productName", class="input" required>
                    <br>
                    <label class="text">Preço:</label><br><input type="text", name="productPrice", class="input" required>
                    <br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit", name="submitProduct", class="input" value="Adicionar Produto">
                </fieldset>
            </div>

        </form>
        <br>

        <form method="post" action="/user/addNew/{{$user->id}}">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Adicionar News</legend>
                    <label class="text">Título:</label><br><input type="text", name="newTitle", class="input" required>
                    <br>
                    <label class="text">Conteúdo:</label>
                    <br>
                    <textarea rows="20" cols="70" name = "newContent"></textarea>
                    <br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit", name="addNew", class="input" value="Adicionar Notícias">
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
                        <input type="hidden" class="input" name="_token" value="{{csrf_token()}}">
                    @endif
                </fieldset>
            </div>
        </form>
        <br>
        <form method="post" action="/user/deleteProduct">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Eliminar Produto</legend>

                    @foreach($products as $product)
                        <input type = "checkbox" class="input" name = "{{$product->id}}" value = "{{$product->name}}">
                        {{$product->id}}
                        {{$product->name}}
                        <br>
                    @endforeach

                    @if(1==1)
                        <input type = "submit" name = "deleteProduto" value="Eliminar">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @endif

                </fieldset>
            </div>
        </form>
        <br>
        <form method="post" action="\user\newState">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Eliminar/Editar Notícias</legend>

                    @foreach($news as $new)
                        <input type = "radio" id = class="input" name = "newState">
                        {{$new->id}}
                        {{$new->title}}
                        <br>
                    @endforeach

                    @if(1==1)
                        <input type = "submit" name = "deleteNew" value="Eliminar New">
                        <input type = "submit" name = "editarNew" value="Editar  New">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @endif

                </fieldset>
            </div>
        </form>
        <br>



    @else
         <h1>Página de Socio</h1>
         <br>
         <form method="post" action="/user/emptyBasket">
             <div class="form-group">
                 <fieldset class="field">
                     <legend class="nv-legend">Eliminar Produto</legend>

                     @foreach($basket_temp as $basket_product)
                         @foreach($products as $product)
                             @if($basket_product->product_id ==$product->id)
                                 <input type = "checkbox" id = "che" name = "{{$product->id}}" value = "{{$product->name}}">
                                 {{$product->id}}
                                 {{$product->name}}
                                 <br>
                             @endif
                         @endforeach
                     @endforeach

                     @if(1==1)
                         <input type = "submit" name = "deleteProduto" value="Eliminar">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                     @endif

                 </fieldset>
             </div>
         </form>
         <br>


    @endif


@endsection
