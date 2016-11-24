@extends('layouts.layout')
@section('content')

    @if($user->type)
        <h1>Página de Administrador</h1>
        <form method="post" action="/user/addProduct">
            <input type="submit" name="addProduct" value="Adicionar Produto">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
        <form method="post" action="/user/deleteSocio">
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
         </form>
    @else
         <h1>Página de Socio</h1>

    @endif

@endsection
