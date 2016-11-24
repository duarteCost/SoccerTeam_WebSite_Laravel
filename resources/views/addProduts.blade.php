@extends('layouts.app')
    @if($user->type)
        @if($_POST['addProduct'])
            <h1>addicionar produtos</h1>
        @endif
    @endif

@endsection