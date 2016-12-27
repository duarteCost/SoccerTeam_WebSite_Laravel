@extends('layouts.layout')
@section('header')
    <title>FC ajuda</title>
@stop
@section('content')
    <form method="post"  action="/help/addTicket" >
        <h1>ppppp</h1>
        <div   id="add_Product" class="form-group" >
            <fieldset class = "userState">
                <input class = "userState" type="hidden" name="_token" value="{{csrf_token()}}">
                <input class = "userState" type="submit" name="submitTicket" value="Adicionar Ticket">
            </fieldset>
            <br>
        </div>
    </form>
@stop
@section('footer')
@stop