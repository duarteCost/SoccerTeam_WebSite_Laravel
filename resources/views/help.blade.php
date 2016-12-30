@extends('layouts.layout')
@section('header')
    <link rel = "stylesheet" href = "/css/helpStyle.css" >
    <title>FC ajuda</title>
@stop
@section('content')
<div class = "content">
    <div class="row">
        <div class="col-md-12">
            <h2>Tem alguma questão? contacte-nos!</h2>
            <hr>
            <form action="{{ url('help') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group-email">
                    <label name="email">Seu Email:</label>
                    <input id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group-subject">
                    <label name="subject">Assunto:</label>
                    <input id="subject" name="subject" class="form-control" required>
                </div>

                <div class="form-group-message">
                    <label name="message">Mensagem:</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Escreva aqui sua mensagem..."></textarea>
                </div>

                <input id="button" type="submit" value="Enviar Mensagem" class="btn btn-success">
            </form>
        </div>
    </div>

</div>
@stop