@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <?php $id = Auth::id()?>
            @foreach ($users as $user)
                @if($user->id == $id)
                    <?php $tipe = $user->type?>
                @endif
            @endforeach

            @if($tipe)
                <h1>A pagina de administrador sera aqui</h1>
            @else
                <h1>A pagina de socio sera aqui</h1>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
