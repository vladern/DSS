@extends('layouts.master')
@section('title','Hilos')
@section('content')


<link href="/css/estilomensaje.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

</br>
</br>
</br>
</br/>

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

                    <span class="pull-right">
                        <ul style="list-style-type:none">
                            <li>
                                <span class="glyphicon glyphicon-th-list pull-right"> {{$category->threads->count()}} </span>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-comment pull-right" style="margin-top:1%"> {{$totalmensajes}} </span>
                            </li>
                            <li>
                                <a href="{{route('thread.create')}}">
                                <button type="button" class="btn btn-secondary btn-sm" style="margin-top:20%">
                                    <span class="glyphicon glyphicon-plus pull-right" >Hilo</span>
                                </button>
                                </a>
                            </li>
                        </ul>
                    </span>
                    </div>
                    </div>


                <div class="col-md-12" style="margin-top:2%">
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

                                <img src="/images/{{$icono}}" class="img-circle avatar" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="{{route('thread.show',$thread->id)}}"><b>{{$thread->descripcion}}</b></a>
                                </div>
                                <h6 class="text-muted time">Posted by:  {{$thread->user->name}}</h6>
                                <h6 class="text-muted time">Date:  {{$thread->created_at}}</h6>
                            </div>
                            <span class="pull-right">
                            <ul style="list-style-type:none">
                            <li>
                                <span class="glyphicon glyphicon-comment"> {{$thread->num_mensajes}}
                                </span>
                            </li>
                                @if(Auth::check())
                                    @if(Auth::user()->tipo=='admin')
                                    <li>
                                        <a href="{{route('thread.destroy',$thread->id)}}" onclick="return confirm('Estas seguro ?')"  role="button">
                                            <span class="glyphicon glyphicon-remove " aria-hidden="true">Delete</span>
                                        </a>
                                    </li>   
                                    @endif
                                @endif 
                            </ul>    
                            </span>
                    </div>
                    </div>
                @endforeach
            {!! $threads->render() !!}
                
</div>
</div>
</div>
@endsection