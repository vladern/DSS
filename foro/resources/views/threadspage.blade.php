@extends('layouts.master')
@section('title','Welcome')
@section('content')


<link href="/css/estilomensaje.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

</br>
</br>
</br>
</br/>


    <div class="container">

        <div class="row">
        <div class="col-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://irdl.info.yorku.ca/files/2014/02/category-icon-panel.png" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="{{route('categories.show',$category->id)}}"><b>{{$category->titulo}}</b></a>
                        </div>
                        <h6 class="text">Descripcion de la Categoria</h6>
                    </div>


                    <?php
                        $totalmensajes = DB::table('threads')->where('category_id',$category->id)->sum('num_mensajes');
                    ?>

                    <div class="col-8">
                    <span class="glyphicon glyphicon-th-list pull-right"> {{$category->threads->count()}} </span>
                    </br>
                    <span class="glyphicon glyphicon-comment pull-right"> {{$totalmensajes}} </span>
                    </div>


                </div> 
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-9">
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

            </div>
        </div>
    </div>


@endsection