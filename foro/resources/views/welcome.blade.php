
@extends('layouts.master')
@section('title','Welcome')
@section('content')

<link href="/css/estilomensaje.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

</br>
</br>
</br>

<div class="container">
    <div class="row">    
            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span id="search_concept">Filtrar</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Recientes</a></li>
                      <li><a href="#its_equal">Antiguos</a></li>
                      <li><a href="#greather_than">Populares</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Buscar hilo">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
    </div>
</div>

</br>

    <div class="container">
        <div class="row">
            <div class="col-8">
                @foreach($threads as $thread)
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">

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
                    <div class="post-description">                     

                    </div>
            </div>
                @endforeach
                {!! $threads->render() !!}

            </div>
        </div>
    </div>

@endsection




    






