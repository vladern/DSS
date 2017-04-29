
@extends('layouts.master')
@section('title','Welcome')
@section('content')

<link href="/css/estilomensaje.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

</br>
</br>
</br>
</br>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead">Categorias</p>
                <div class="list-group">
                
                @foreach($categories as $category)
                    <a href="#" class="list-group-item">{{$category->titulo}}</a>
                @endforeach
                </div>
            </div>

            <div class="col-md-9">
                
                <br/>
                <br/>
                <!-- Posted Comments --> 
                <!-- Comment -->
                @foreach($threads as $thread)
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="{{route('thread.show',$thread->id)}}"><b>{{$thread->descripcion}}</b></a>
                        </div>
                        <h6 class="text-muted time">Posted by:  {{$thread->user->name}}</h6>
                        <h6 class="text-muted time">Date:  {{$thread->created_at}}</h6>
                    </div>
                          <span class="pull-right">
        <span class="glyphicon glyphicon-comment"> {{$thread->num_mensajes}}
        </span>
                </div> 
                
                @foreach($thread->messages as $message)
                    <div class="post-description">                     
                        <p>{{$message->texto}}</p>
                    </div>
                    @break
                @endforeach

            </div>
                @endforeach
                {!! $threads->render() !!}

            </div>
        </div>
    </div>

@endsection




    






