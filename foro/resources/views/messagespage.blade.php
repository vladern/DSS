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
        <div class="col-md-12">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading" style="background-color: #D8D8D8">
                    <h3 href="#"><b>{{$thread->descripcion}}</b> <span class="label label-warning pull-right">{{$thread->category->titulo}}</span> </h3>
                </div>

@foreach ($messages as $message)
    <div class="row" style="margin-top:2%">
        <div class="col-md-11" style="margin-left:5%">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">


                        <?php
                            $contador = DB::table('images')->where('user_id',$message->user_id)->count();

                            if ($contador == 0) {
                                $icono = "default.jpg";
                            }
                            else {
                                $fotoperfil = DB::table('images')->where('user_id',$message->user_id)->orderby('id','desc')->first();
                                $icono = $fotoperfil->imagen;
                            }
                        ?>

                    <img src="/images/{{$icono}}" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>{{$message->user->name}}</b></a>
                        </div>
                        <h6 class="text-muted time">Date: {{$message->created_at}}</h6>
                    </div>
                    <ul style="list-style-type:none;float:right;margin-right:2%;margin-bottom: 10%;">
                    @if(Auth::check())
                        <li>
                            <a href="" role="button">
                                <span class="glyphicon glyphicon-pencil" >Citar</span>
                            </a>
                        </li>
                        @if(Auth::user()->tipo=='admin')
                        <li>
                            <a href="{{route('message.destroy',$message->id)}}" onclick="return confirm('Estas seguro ?')"  role="button">
                                <span class="glyphicon glyphicon-remove ">Delete</span>
                            </a>
                        </li>   
                        @endif
                    @endif    
                    </ul>
                </div> 
                <div class="post-description"> 
                    <!--<p>{!!  nl2br(e($message->texto)) !!}</p>-->
                    <div class="well">
                        {!!$message->texto!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
</div>
</div>
</div>
</br>

<script>
function addText(event) {
    var targ = event.target || event.srcElement;
    document.getElementById("area").value += targ.textContent || targ.innerText;
}
</script>


<div class="container">
    <div class="row">
        <div class="well">
            <button type="button" class=".btn-primary pull-right"><li class="hide">[vid]  [/vid]</li>
            <span class="glyphicon glyphicon glyphicon-film"></span></button>
            </ol>

            <h4><i class="fa fa-paper-plane-o"></i> Dejar comentario: 
            </h4>
            
                    {!! Form::open(['route' => 'message.store','method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::textarea('texto',null,['id' => 'area','class'=>'form-control textarea','placeholder' => 'Texto','required']) !!}

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

@section('js')
    <script>
        $('textarea').trumbowyg({
        });
    </script>
@endsection

@endsection



