 <link href="css/subirarchivo.css" rel="stylesheet">
@extends('layouts.master')
@section('title','Welcome')
@section('content')
<!-- Page Content -->
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
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-circle img-responsive img-center" src="https://yt3.ggpht.com/-ZFXH0VqNE3M/AAAAAAAAAAI/AAAAAAAAAAA/tCv9jhjaCTk/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" width="64" height="64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                        {{$thread->descripcion}}
                        </h4>
                        @if(count($thread->messages)==0)
                            No hay mensajes,se el primero en dejar uno.
                        @endif
                        @foreach($thread->messages as $message)
                            {{$thread->user->name}} : {{$message->texto}}
                        @endforeach
                    </div>
                </div>
                @endforeach
                <br/>
                <br/>

            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection


    






