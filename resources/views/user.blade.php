@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/userStyle.css" >
    <title>{{$user->name}}</title>
@stop
@section('content')
    <script type="text/javascript">

        // document.getElementById("add_Product").style.display = 'none';
        //document.getElementById("add_New").style.display = 'none';
        //document.getElementById("delete_socio").style.display = 'none';
        //document.getElementById("delete_products").style.display = 'none';
        //document.getElementById("new_state").style.display = 'none';
       function exibe(el) {

           var display = document.getElementById(el).style.display;
           if (display == "none")
               document.getElementById(el).style.display = 'block';
           else
               document.getElementById(el).style.display = 'none';
       }

    </script>



    @if($user->type)

        <h1>Página de Administrador</h1>
        <br>
        <h3>Escolha a tarefa que deseja realizar</h3>
        <br>

        <!--adiconar produtos-->
        <ul class = "userState">
            <li class = "userState"><a class = "userState" onclick="exibe('add_Product');" href="#">Adicionar produto</a>
                <form method="post"  action="/user/addProduct/{{$user->id}}" enctype="multipart/form-data">
                    <div style="display: none"  id="add_Product" class="form-group" >
                        <fieldset class = "userState">
                            <legend class = "userState">Adicionar Produto</legend>
                            <label class = "userState">Nome:</label><input type="text", name="productName", class="input" required>
                            <br>
                            <br>
                            <label class = "userState">Preço:</label><input type="text", name="productPrice", class="input" required>
                            <br>
                            <br>
                            <label class = "userState" for="imagem">Imagem:</label>
                            <input class = "userState" type="file" name="image" required/>
                            <br>
                            <br>
                            <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
                            <br>
                            <input class = "userState" type="submit" name="submitProduct" value="Adicionar Produto">
                        </fieldset>
                        <br>
                    </div>
                </form>
            </li>

            <li class = "userState"><a class = "userState" onclick="exibe('new_state');" href="#">Criar/Eliminar/Editar Notícia</a>
                <div  id="new_state" class="form-group">


                    <!-- interface criar ou editar notícia-->
                    @if(!isset($new))
                        <form  method="post" action="/user/addNew" enctype="multipart/form-data">
                            <fieldset class = "userState">
                                <legend class = "userState">Adicionar News</legend>

                                <label class = "userState">Título:</label><br><input type="text", size="68" name="newTitle", class="input" required>
                                <br>
                                <br>
                                <label class = "userState">Conteúdo:</label>
                                <textarea class = "userState" rows="20" cols="70" name = "newContent"></textarea>
                                <br>
                                <br>
                                <label class = "userState" >Imagem da Notícia:</label>
                                <input class = "userState" type="file" name="imageNew" required/>
                                <br>
                                <br>
                                <br>
                                <label class = "userState">Banner da Notícia  :</label><br>
                                <input class = "userState" type="file" name="imageBanner" required/>
                                <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
                                <input class = "userState" type="submit", name="addNew" value="Submeter Notícias">
                            </fieldset>
                        </form>
                        <br>

                    @else
                        <form method="post" action="/user/addNew/{{$new->id}}" enctype="multipart/form-data">
                            <fieldset class = "userState">
                                <legend class = "userState" class="nv-legend">Editar News</legend>

                                <label class = "userState">Título:</label><input type="text", size="68" name="newTitle", class="input" value="{{$new->title}}" required>
                                <br>
                                <br>
                                <label class = "userState">Conteúdo:</label>
                                <textarea class = "userState" rows="20" cols="70" name = "newContent" required>{{$new->content}}</textarea>
                                <br>
                                <br>
                                <label class = "userState" for="imagem">Imagem da Notícia:</label>
                                <input class = "userState" type="file" name="imageNew" />
                                <br>
                                <br>
                                <label class = "userState" for="imagem">Banner da Notícia  :</label>
                                <input class = "userState" type="file" name="imageBanner" />
                                <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
                                <input class = "userState" type="submit", name="addNew" value="Editar Notícias">
                            </fieldset>

                        </form>
                        <br>
                        <br>
                    @endif

                <!--escolhe a notícia e verifica se o estado é editar ou eliminar-->
                    @if(count($news))
                        <form method="post" action="/user/newState">
                            <fieldset class = "userState">
                                <legend class = "userState">Eliminar/Editar Notícias</legend>

                                @foreach($news as $new)
                                    <input class = "userState" type = "radio"  name = "newId" value="{{$new->id}}">
                                    <label class="userStateRadio">{{$new->id}} {{$new->title}}</label>

                                    <br>
                                @endforeach

                                <input class = "userState" type = "submit" name = "newState" value="Eliminar New">
                                <input id = "butonExp" class = "userState" type = "submit" name = "newState" value="Editar  New">
                                <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">

                            </fieldset>
                            <br>
                        </form>
                    @endif

                </div>
            </li>

            <li class = "userState"><a class = "userState" onclick="exibe('delete_socio');" href="#">Eliminar Socio</a>
                <!--delete socio-->
                @if(count($users))
                    <form  method="post" action="/user/deleteSocio">
                        <div style="display: none" id="delete_socio"  class="form-group">
                            <fieldset class = "userState">
                                <legend class = "userState">Eliminar Socio</legend>
                                @foreach($users as $user)
                                    @if(!$user->type)
                                       <input class = "userState" type = "checkbox" id = "che" name = "{{$user->id}}" value = "{{$user->name}}">
                                        <label class="userStateRadio">{{$user->id}} {{$user->name}}</label>
                                        <br>
                                    @endif
                                @endforeach
                                <br>
                                <br>
                                <input class = "userState" type = "submit" name = "deleteSocio" value="Eliminar">
                                <input class = "userState" type="hidden" class="input" name="_token" value="{{csrf_token()}}">
                                <br>
                            </fieldset>
                            <br>
                        </div>
                    </form>
                @endif
            </li>
            <li class = "userState"><a class = "userState" onclick="exibe('delete_products');" href="#">Adicionar Imagem/Eliminar Produto</a>
                @if(count($products))
                    <!--delete product-->
                    <form method="post" action="/user/delete_editProduct" enctype="multipart/form-data">
                        <div style="display: none" id="delete_products" class="form-group">
                            <fieldset class = "userState">
                                <legend class = "userState">Adicionar Imagem/Eliminar Produto</legend>

                                @foreach($products as $product)
                                    <!--<input type = "checkbox" class="input" name = "{{$product->id}}" value = "{{$product->name}}">-->
                                    <input class = "userState" type = "radio" class="input" name = "product_Id" value="{{$product->id}}">
                                    <label class="userStateRadio">{{$product->id}} {{$product->name}}</label>
                                    <br>
                                @endforeach
                                    <br>
                                    <label class = "userState" for="imagem">Adicionar Imagem:</label>
                                    <input class = "userState" type="file" name="image"/>
                                    <br>
                                    <br>
                                    <input class = "userState" type = "submit" name = "productState" value="Eliminar">
                                    <input id = "butonExp" class = "userState" type = "submit" name = "productState" value="Adicionar Imagem">
                                    <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
                                    <br>

                            </fieldset>
                        </div>
                    </form>
                @endif
            </li>
        </ul>

    @else

         <h1>Página de Socio</h1>
         <br>
         <h2>O você tem {{$user->amount}}€ para gastar.</h2>
         <br>
         <!--ver produtos do sócio-->
         @if(count($basket_temp))
             <form method="post" action="/user/basketOperation">
                 <div class="form-group">
                     <fieldset class = "userState">
                         <legend class = "userState">Produtos no carrinho</legend>

                         @foreach($basket_temp as $basket_product)
                             @foreach($products as $product)
                                 @if($basket_product->product_id ==$product->id)
                                     <input class = "userState" type="hidden" name="{{$product->id}}" value="{{$product->name}}">
                                     <p id = "p_exep" class= "userState">Nome : {{$product->name}}</p>
                                     <p class = "userState">Preço: {{$product->price}}</p>
                                     <br>
                                     <!--imagem    JORGE-->

                                     @if(!empty($array_urls[$basket_product->product_id][0]))


                                         <img class="produts" src="{{$array_urls[$basket_product->product_id][0]}}"/>


                                     @endif

                                     <!-- FIM  imagem    JORGE-->
                                     <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
                                     <input class = "userState" type = "submit" name = "basketOperation" value="Eliminar">
                                     @if($user->amount-$product->price>=0)
                                         <input class = "userState" type = "submit" name = "basketOperation" value="Comprar">

                                     @endif
                                 @endif
                             @endforeach
                         @endforeach
                     </fieldset>
                     <br>
                 </div>
             </form>
         @endif

             <!--ver produtos comprados-->
         @if(count($products_Purchased))
             <li class = "userState"><a class = "userState" onclick="exibe('product_purchased');" href="#">Adicionar Imagem/Eliminar Produto</a>
                 <div id="product_purchased" style="display: none">
                     <fieldset class = "userState">
                         <legend class = "userState">Produtos Comprados</legend>

                         @foreach($products_Purchased as $product_purchased)
                             @foreach($products as $product)
                                 @if($product_purchased->product_id ==$product->id)
                                     <input class = "userState" type="hidden" name="{{$product->id}}" value="{{$product->name}}">
                                     <p id = "p_exep" class= "userState">Nome : {{$product->name}}</p><p class= "userState"> Preço: {{$product->price}}</p>
                                     <hr>
                                 @endif
                             @endforeach
                         @endforeach
                     </fieldset>
                     <br>
                 </div>
            </li>
         @endif




    @endif


@endsection
