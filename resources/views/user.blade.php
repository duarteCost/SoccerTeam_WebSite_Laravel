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

       function validateProduct(){
           var product_price = add_products.productPrice.value;
           if(isNaN(product_price)) alert("Introduza um preço válido");
       }

       function validateGame(){
           var ticket_price = add_game_form.ticket_price.value;
           if(isNaN(ticket_price)) alert("Introduza um preço válido");
       }


    </script>



    @if($user->type)

        <div class = "content">
            <h1>Página de Administrador</h1>
            <br>
            <h2>Escolha a tarefa que deseja realizar</h2>
            <br>

            <!--adiconar produtos-->
                <li class = "userState"><a class = "userState" onclick="exibe('add_Product');" href="#">Adicionar produto</a>
                    <form name = "add_products" method="post"  action="/user/addProduct/{{$user->id}}" enctype="multipart/form-data">
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
                                <input class = "userState" type="submit" name="submitProduct" onclick="return validateProduct()" value="Adicionar Produto">
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
                                <input class = "userState" type="file" name="imageBanner" />
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

                <li class = "userState"><a class = "userState" onclick="exibe('delete_socio');" href="#">Verificar Socio</a>
                <!--delete socio-->
                @if(count($users))
                    <div style="display: none" id="delete_socio"  class="form-group">
                        <form  method="post" action="/user/deleteSocio">
                            <fieldset class = "userState">
                                <legend class = "userState">Verificar Socio</legend>
                                @foreach($users as $user)
                                    @if(!$user->type)
                                       <input class = "userState" type = "checkbox" id = "che" name = "{{$user->id}}" value = "{{$user->name}}">
                                        <li class = "userState"><a class="userStateCheck" onclick="exibe('product_purchased_socio{{$user->id}}');" href="#">{{$user->id}} {{$user->name}}  </a>
                                            <div id = "product_purchased_socio{{$user->id}}" style = "display: none">
                                                @foreach($products_Purchased as $product_purchased)
                                                    @foreach($products as $product)
                                                        <div class = "product_socio">
                                                            @if($product_purchased->product_id ==$product->id && $product_purchased->user_id ==$user->id )
                                                                <p class = "product_purchased2">{{$product->name}}</p>
                                                                <p class = "product_purchased">Preço: {{$product->price}}€</p>
                                                                <p class = "product_purchased4"> </p>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @endforeach

                                            <!--tickets comprados-->

                                                @foreach($products_Purchased as $product_purchased)
                                                    @foreach($tickets as $ticket)
                                                        <div class = "product_socio">
                                                            @if($product_purchased->ticket_id ==$ticket->id && $product_purchased->user_id ==$user->id)
                                                                <p class = "product_purchased2">Bilete</p>
                                                                <p class = "product_purchased2">{{$ticket->game_name}}</p>
                                                                <p class = "product_purchased">Preço: {{$ticket->price}}</p>
                                                                <p class = "product_purchased">Zona:
                                                                    @if($ticket->area=="zone_a")
                                                                        Zona A
                                                                    @elseif($ticket->area=="zone_b")
                                                                        Zona B
                                                                    @elseif($ticket->area=="zone_c")
                                                                        Zona C
                                                                    @elseif($ticket->area=="zone_d")
                                                                        Zona D
                                                                    @endif

                                                                </p>
                                                                <p class = "product_purchased">Data: {{$ticket->date}}</p>
                                                                <p class = "product_purchased4"> </p>

                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </li>
                                        <br>
                                    @endif
                                @endforeach
                                <br>
                                <br>
                                <input class = "userState" type = "submit" name = "deleteSocio" value="Eliminar">
                                <input class = "userState" type="hidden"  name="_token" value="{{csrf_token()}}">
                                <br>
                            </fieldset>
                            <br>
                        </form>
                    </div>
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
                                    <p><input class = "userState" type = "radio" class="input" name = "product_Id" value="{{$product->id}}" required>
                                    <label class="userStateRadio">{{$product->id}} {{$product->name}}</label></p>
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

            <!--inserir jogo-->

                <li class = "userState"><a class = "userState" onclick="exibe('add_game');" href="#">Adicionar Jogo</a>
                @if(count($clubs))
                    <!--delete product-->
                    <form name = "add_game_form" method="post" action="/user/addGame">
                        <div style="display: none" id="add_game" class="form-group">
                            <fieldset class = "userState">
                                <legend class = "userState">Adicionar Jogo</legend>
                                <br>
                                <div class="add_game">
                                    <label class = "userState2">Selecione o Jogo que quer adicionar:</label>
                                    <select id = "in_select" name="game" class = "userState" >
                                        @foreach($clubs as $club)
                                            <option  value="{{$club->club_id}}">Real Madrid VS {{$club->club_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div class="add_game">
                                    <label  class = "userState2">Indique a data e a hora do Jogo acima:</label>
                                    <input id = "in_date" type="datetime-local" name="game_time" required>
                                </div>
                                <div class="add_game">
                                    <label  class = "userState2">Indique o preço do bilete para este jogo:</label>
                                    <input id = "in_text"  size="10" type="text" name="ticket_price" required>
                                </div>

                                <br>
                                <br>
                                <input  class = "userState" type = "submit" onclick="return validateGame()" name = "sub_game" value="Adicionar Jogo">
                                <input class = "userState"  type="hidden" name="_token" value="{{csrf_token()}}">
                                <br>
                            </fieldset>
                        </div>
                    </form>
                @endif
                </li>

                <li class = "userState"><a class = "userState" onclick="exibe('remove_game');" href="#">Remover Jogo</a>
                @if(count($games))
                    <!--delete product-->
                    <form method="post" action="/user/removeGame">
                        <div style="display: none" id="remove_game" class="form-group">
                            <fieldset class = "userState">
                                <legend class = "userState">Remover Jogo</legend>
                                <br>
                                <div class="remove_game">
                                    @foreach($games as $game)
                                        @foreach($clubs as $club)
                                            @if($game->awayTeam_id == $club->club_id)
                                                <p><input class = "userState2" type = "radio" class="input" name = "game_id" value="{{$game->game_id}}" required>
                                                <label class="userStateRadio">
                                                    Real Madrid VS {{$club->club_name}}
                                                </label></p>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <br>
                                <input  class = "userState" type = "submit" name = "remove_game" value="Remover Jogo">
                                <input class = "userState"  type="hidden" name="_token" value="{{csrf_token()}}">
                                <br>
                            </fieldset>
                        </div>
                    </form>
                @endif
                </li>
        </div>
    @else
        <div class="content">
             <h1>Página de Socio</h1>
             <br>
             <h2>Você tem disponivel {{$user->amount}}€ para compras.</h2>
             <!--ver produtos do sócio-->
             @if(count($basket_temp))
                 <form method="post" action="/user/basketOperation">
                     <div class="form-group">
                         <fieldset class = "userState">
                             <legend class = "userState">Produtos no carrinho</legend>

                             @foreach($basket_temp as $productToSell)
                                 @foreach($products as $product)
                                     <div class = "product_section">
                                         @if($productToSell->product_id ==$product->id)
                                             <p class = "product_bascket2">{{$product->name}}</p>
                                             <p class = "product_bascket">
                                             <!--imagem    JORGE-->

                                             @if(!empty($array_urls[$productToSell->product_id][0]))


                                                 <img class="produts" src="{{$array_urls[$productToSell->product_id][0]}}"/>


                                             @endif
                                             </p>
                                         <!-- FIM  imagem    JORGE-->

                                             <p class = "product_bascket3">Preço: {{$product->price}}€</p>
                                             <input class = "userBasket" type="hidden" name="_token" value="{{csrf_token()}}">
                                             <p class = "product_bascket2"><input class = "userBasket" type = "submit" name = "{{$productToSell->basket_id}}" value="Eliminar">
                                             @if($user->amount-$product->price>=0)
                                                <input class = "userBasket" type = "submit" name = "{{$productToSell->basket_id}}" value="Comprar"></p>

                                             @endif
                                         @endif
                                     </div>
                                 @endforeach


                                 <!--tickets-->
                                 @foreach($tickets as $ticket)
                                     <div class = "product_section">
                                         @if($productToSell->ticket_id ==$ticket->id)
                                             <p class = "product_bascket2">Bilete</p>
                                             <p class = "product_bascket2">{{$ticket->game_name}}</p>
                                             <p class = "product_bascket3">Preço: {{$ticket->price}}</p>
                                             <p class = "product_bascket3">Zona:
                                                 @if($ticket->area=="zone_a")
                                                    Zona A
                                                 @elseif($ticket->area=="zone_b")
                                                    Zona B
                                                 @elseif($ticket->area=="zone_c")
                                                    Zona C
                                                 @elseif($ticket->area=="zone_d")
                                                    Zona D
                                                 @endif

                                             </p>
                                             <p class = "product_bascket3">Data: {{$ticket->date}}</p>
                                             <br>
                                             <p class = "product_bascket2"><input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
                                             <input class = "userBasket" type = "submit" name = "{{$productToSell->basket_id}}" value="Eliminar">
                                             @if($user->amount-$ticket->price>=0)
                                                 <input class = "userBasket" type = "submit" name = "{{$productToSell->basket_id}}" value="Comprar"></p>

                                             @endif
                                         @endif
                                     </div>
                                 @endforeach
                             @endforeach
                             <div class = "product_section">
                                <p class = "product_bascket2">
                                    <input class = "userBasketAll" type = "submit" name = "buyAll" value="Comprar Todos">
                                    <input class = "userBasketAll" type = "submit" name = "deleteAll" value="Eliminar Todos">
                                </p>
                             </div>
                         </fieldset>
                         <br>
                     </div>
                 </form>
             @endif

                 <!--ver produtos comprados-->
             @if(count($products_user_Purchased))
                 <li class = "userState"><a class = "userState" onclick="exibe('product_purchased');" href="#">Ver produtos Comprados</a>
                     <div id="product_purchased" style="display: none">
                         <fieldset class = "userState">
                             <legend class = "userState">Produtos Comprados</legend>

                             @foreach($products_user_Purchased as $product_purchased)
                                 @foreach($products as $product)
                                     <div class = "product_section">
                                         @if($product_purchased->product_id ==$product->id )
                                             <p class = "product_purchased2">{{$product->name}}</p>
                                             <p class = "product_purchased3">Preço: {{$product->price}}€</p>
                                             <p class = "product_purchased4"> </p>
                                         @endif
                                     </div>
                                 @endforeach
                             @endforeach

                             <!--tickets comprados-->

                             @foreach($products_user_Purchased as $product_purchased)
                                 @foreach($tickets as $ticket)
                                     <div class = "product_section">
                                         @if($product_purchased->ticket_id ==$ticket->id)
                                             <p class = "product_purchased2">Bilete</p>
                                             <p class = "product_purchased2">{{$ticket->game_name}}</p>
                                             <p class = "product_purchased3">Preço: {{$ticket->price}}</p>
                                             <p class = "product_purchased3">Zona:
                                                 @if($ticket->area=="zone_a")
                                                     Zona A
                                                 @elseif($ticket->area=="zone_b")
                                                     Zona B
                                                 @elseif($ticket->area=="zone_c")
                                                     Zona C
                                                 @elseif($ticket->area=="zone_d")
                                                     Zona D
                                                 @endif

                                             </p>
                                             <p class = "product_purchased3">Data: {{$ticket->date}}</p>
                                             <p class = "product_purchased4"> </p>
                                         @endif
                                     </div>
                                 @endforeach
                             @endforeach
                         </fieldset>
                         <br>
                     </div>
                </li>
             @endif
        </div>
    @endif


@endsection
