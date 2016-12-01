@extends('layouts.layout')
@section('content')

    @if($user->type)
        <h1>Página de Administrador</h1>
        <br>
        <!--adiconar produtos-->
        <form method="post" action="/user/addProduct/{{$user->id}}" enctype="multipart/form-data">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Adicionar Produto</legend>
                    <label class="text">Nome:</label><br><input type="text", name="productName", class="input" required>
                    <br>
                    <label class="text">Preço:</label><br><input type="text", name="productPrice", class="input" required>
                    <br>
                    <br>
                    <label for="imagem">Imagem:</label>
                    <br>
                    <input type="file" name="image" required/>
                    <br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit", name="submitProduct", class="input" value="Adicionar Produto">
                </fieldset>
            </div>

        </form>
        <br>
        <!-- interface criar ou editar notícia-->
        @if(!isset($new))
            <form method="post" action="/user/addNew" enctype="multipart/form-data">
                <div class="form-group">
                    <fieldset class="field">
                        <legend class="nv-legend">Adicionar News</legend>

                        <label class="text">Título:</label><br><input type="text", name="newTitle", class="input" required>
                        <br>
                        <label class="text">Conteúdo:</label>
                        <br>
                        <textarea rows="20" cols="70" name = "newContent"></textarea>
                        <br>
                        <br>
                        <label for="imagem">Imagem:</label>
                        <br>
                        <input type="file" name="image" required/>
                        <br>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit", name="addNew", class="input" value="Submeter Notícias">
                    </fieldset>
                </div>
            </form>
            <br>

        @else
            <form method="post" action="/user/addNew/{{$new->id}}" enctype="multipart/form-data">
                <div class="form-group">
                    <fieldset class="field">
                        <legend class="nv-legend">Editar News</legend>

                        <label class="text">Título:</label><br><input type="text", name="newTitle", class="input" value="{{$new->title}}" required>
                        <br>
                        <label class="text">Conteúdo:</label>
                        <br>
                        <textarea rows="20" cols="70" name = "newContent" required>{{$new->content}}</textarea>
                        <br>
                        <label for="imagem">Imagem:</label>
                        <br>
                        <br>
                        <input type="file" name="image" required/>
                        <br>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit", name="addNew", class="input" value="Submeter Notícias">
                    </fieldset>
                </div>

            </form>
            <br>

            @endif
        </form>
        <br>
            <!--escolhe a notícia e verifica se o estado é editar ou eliminar-->
        <form method="post" action="/user/newState">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Eliminar/Editar Notícias</legend>

                    @foreach($news as $new)
                        <input type = "radio"  class="input" name = "newId" value="{{$new->id}}">
                        {{$new->id}}
                        {{$new->title}}
                        <br>
                    @endforeach

                    @if(1==1)
                        <input type = "submit" name = "newState" value="Eliminar New">
                        <input type = "submit" name = "newState" value="Editar  New">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @endif

                </fieldset>
            </div>
        </form>
        <br>
        <!--delete socio-->
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
            <!--delete product-->
        <form method="post" action="/user/delete_editProduct" enctype="multipart/form-data">
            <div class="form-group">
                <fieldset class="field">
                    <legend class="nv-legend">Adicionar Imagem/Eliminar Produto</legend>

                    @foreach($products as $product)
                        <!--<input type = "checkbox" class="input" name = "{{$product->id}}" value = "{{$product->name}}">-->
                        <input type = "radio" class="input" name = "product_Id" value="{{$product->id}}">
                        {{$product->id}}
                        {{$product->name}}
                        <br>
                    @endforeach

                    @if(1==1)
                        <br>
                        <label for="imagem">Adicionar Imagem:</label>
                        <br>
                        <input type="file" name="image"/>
                        <br>
                        <input type = "submit" name = "productState" value="Eliminar">
                        <input type = "submit" name = "productState" value="Adicionar Imagem">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @endif

                </fieldset>
            </div>
        </form>
        <br>

    @else
         <h1>Página de Socio</h1>
         <br>
         <!--ver produtos do sócio-->
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
