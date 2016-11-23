@extends('layouts.app')
@section('content')
    @if($user->type)
        @if($_POST['addProduct'])
            <h1>addicionar produtos</h1>
        @endif
    @endif

@endsection