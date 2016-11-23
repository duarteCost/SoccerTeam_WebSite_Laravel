@extends('layouts.app')
@section('content')

    @if($user->type)
        <h1>Página de Administrador</h1>
        <form method="post" action="/user/addProduct">
            <input type="submit" name="addProduct" value="Adicionar Produto">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    @else
         <h1>Página de Socio</h1>

    @endif

@endsection
