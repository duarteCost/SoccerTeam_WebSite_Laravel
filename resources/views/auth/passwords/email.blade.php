@extends('layouts.app')

<!-- Main Content -->
@section('header')
    <link rel = "stylesheet" href = "/css/forguetPass.css" >
    <title>Pass</title>
@stop
@section('content')
<div class="container">
    <div class = "f_pass">

        @if (session('status'))
            {{ session('status') }}
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <label>E-Mail Address</label>
            <br>
            <p><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required></p>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <p class="submit"><input type="submit"  value = "Send"></p>
        </form>
    </div>
</div>
@endsection
