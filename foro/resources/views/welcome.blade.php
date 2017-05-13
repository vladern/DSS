@extends('layouts.master')
@section('title','Welcome')
@section('content')

<link href="/css/estilomensaje.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

</br>
</br>
</br>
<div class="col-md-12">
    <div class="col-md-3">
        <div class="list-group">
            <a href="{{route('categories.index',$categories)}}" class="list-group-item" style="text-align:center;background-color:black;text-transform: uppercase;color: white;">
                Top 5 categorias
            </a>
            @php ($cont = 0)
            @foreach($categories as $category)
                @php ($cont++)
                <a href="{{route('categories.show',$category)}}" class="list-group-item">{{$category->titulo}}</a>
                @if($cont==5)
                    @break
                @endif
            @endforeach
        </div>
        <ul class="list-group">
        <li class="list-group-item" style="text-align:center;background:black;color:white">Estadísticas</li>
        <li class="list-group-item">Número de usuarios: {{$numUsers}}</li>
        <li class="list-group-item">Número de hilos: {{$numThr}}</li>
        <li class="list-group-item">Número de mensajes: {{$numMess}}</li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="container-fluid">
            <div class="row">    
                

                    {!! Form::open(['route' => '/','method' => 'GET']) !!}
                        <div class="input-group search-panel">

                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="search_concept">Filtrar</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('recent')}}">Recientes</a></li>
                            <li><a href="{{route('old')}}">Antiguos</a></li>
                            <li><a href="{{route('/')}}">Populares</a></li>
                            </ul>
                        </div>

                          {!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Buscar Hilo']) !!} 

                          <span class="input-group-btn">
                            {!! Form::submit('Buscar',['class'=> 'btn btn-primary']) !!}
                          </span>  
                        </div>
                    {!! Form::close() !!}

            </div>
        </div>
        </br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @foreach($threads as $thread)
                        <div class="col-xs-12 panel panel-white post panel-shadow animated  bounceInDown">
                            <div class="post-heading">
                                <div class="col-md-2 pull-left">
                                    <?php
                                        $contador = DB::table('images')->where('user_id',$thread->user_id)->count();

                                        if ($contador == 0) {
                                            $icono = "default.jpg";
                                        }
                                        else {
                                            $fotoperfil = DB::table('images')->where('user_id',$thread->user_id)->orderby('id','desc')->first();
                                            $icono = $fotoperfil->imagen;
                                        }
                                    ?>

                                    <img src="images/{{$icono}}" class="img-circle avatar" alt="user profile image">

                                </div>
                                <div class="col-md-8 pull-left meta">
                                    <div class="title h5">
                                        <a href="{{route('thread.show',$thread->id)}}"><b>{{$thread->descripcion}}</b></a>
                                    </div>
                                    <h6 class="text-muted time">Posted by:  {{$thread->user->name}}</h6>
                                    <h6 class="text-muted time">Date:  {{$thread->created_at}}</h6>
                                </div>
                                <div class="col-md-2">
                                    <span class="pull-right">
                                        <span class="glyphicon glyphicon-comment"> {{$thread->num_mensajes}}</span>
                                    </span>
                                </div>
                          </div> 
                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection