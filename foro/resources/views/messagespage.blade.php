@extends('layouts.master')
@section('title','Mensajes')
@section('content')

<br/>
<br/>
<br/>
<br/>

<link href="/css/estilomensaje.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<div class="container">

    <div class="row">
        <div class="col-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading" style="background-color: #D8D8D8">
                    <h3 href="#"><b>{{$thread->descripcion}}</b> <span class="label label-warning pull-right">{{$thread->category->titulo}}</span> </h3>
                </div> 
            </div>
        </div>
    </div>


@foreach ($messages as $message)
    <div class="row">
        <div class="col-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>{{$message->user->name}}</b></a>
                        </div>
                        <h6 class="text-muted time">Date: {{$message->created_at}}</h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p>{{$message->texto}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
</br>


<div class="container">
    <div class="row">
        <div class="well">
            <h4><i class="fa fa-paper-plane-o"></i> Leave a Comment:</h4>

                    {!! Form::open(['route' => 'message.store','method' => 'POST']) !!}
                    <div class="form-group">    
                        {!! Form::textarea('texto',null,['class'=>'form-control','placeholder' => 'Texto','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Enviar',['class'=> 'btn btn-primary']) !!}
                    </div>
                    {!! Form::hidden('thread_id', $thread->id) !!}
                    {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>


@endsection



