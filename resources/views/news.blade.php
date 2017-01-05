@extends('layouts.layout')
@section('header')
    <title>Notícias FC</title>
    <link rel = "stylesheet" href = "/css/newsStyle.css" >
@stop
@section('content')
<div class = "content">
    <div class="news">
    <h1>Notícias</h1>

        <script type="text/javascript">
            function toggleMe(b, c, d ){


                var r=document.getElementById(b);
                var e=document.getElementById(c);

                if(!r)return true;

                if(r.style.display=="none"){
                    r.style.display="block";
                    e.style.display="none";


                }
                else{
                    r.style.display="none";
                }

                return true;
            }

        </script>

    @foreach($latest_news as $new)
            <div class="new">
                <br>


        @if(!empty($array_urls[$new->id][0]))

                    <div class="image">
            <img  class="news" src="{{$array_urls[$new->id][0]}}"/>
                    </div>
        @endif


                <div class="title">
        <h2> <a class="news" href="/detailsNews/{{$new->id}}">{{$new->title}} {{$new->id}}</a></h2>
                </div>
            <br>

                <div class="new_content" id="{{$new->id}}_content150"   >{!! str_limit($new->content, $limit = 150, $end = '')!!}

                <a   href="javascript:toggleMe('{{$new->id}}_content', '{{$new->id}}_content150', '{{$new->id}}_menos');">mais...</a>

                </div>

                <div class="new_content" id="{{$new->id}}_content" style="display:none">
                    {{ $new->content}}
                        <script>
                            document.getElementById("{{$new->id}}_content").innerHTML="{{ $new->content}}";
                        </script>


                <a  id="{{$new->id}}_menos"  href="javascript:toggleMe('{{$new->id}}_content150', '{{$new->id}}_content', '{{$new->id}}_menos');"> menos ^</a>

                </div>



                <br><br>

                {{$new->updated_at}}

                {{$new->name}}


            </div>
            <br><br>
    @endforeach

    </div>
</div>

@stop