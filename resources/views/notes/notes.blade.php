@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My notes</div>
                <div class="panel-body">
                   
                   @foreach($notes as $note)

                   <li>{{$note->note_content}}</li>

                   @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
    
                <div class="panel-body">
                   
                <form method="POST" action="/notes/">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
                 <textarea name="content" class="form-control"></textarea>   
                <button type="submit" class="btn btn-primary"> Add Note</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection