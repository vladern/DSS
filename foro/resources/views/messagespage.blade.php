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
            </div>
        </div>
    </div>

@foreach ($messages as $message)
    <div class="row">
        <div class="col-md-12">
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
                            <a href="{{route('users.edit',$message->user_id)}}"><b>{{$message->user->nick}}</b></a>
                        </div>
                        <h6 class="text-muted time">Date: {{$message->created_at}}</h6>
                    </div>
                    <div class="col-md-2" style="list-style-type:none;float:right;margin-right:2%;margin-bottom: 10%;">
                    @if(Auth::check())
                        <div class="col-md-1" style="float: right;">

                            <ol onclick="addText(event)">
                                <button type="button" class=".btn-primary pull-right"><li class="hide">[citar]{!! $message->id !!}[/citar]</li><span class="glyphicon glyphicon-pushpin"></span></button>
                            </ol>


                        </div>
                        @if(Auth::user()->tipo=='admin')
                        <div class="col-md-1">
                            <a href="{{route('message.destroy',$message->id)}}" onclick="return confirm('Estas seguro ?')" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove">Delete</span>
                            </a>
                        </div>   
                        @endif
                    @endif    
                    </div>
                </div> 

                <div class="post-description"> 
                    
                    <?php
                        $text = $message->texto;
                        //$text = '[citar]154[/citar] string, [citar] my [/citar].';
                        preg_match("/\[citar]([^'\"]*)\[\/citar]/iU", $text, $matches);

                        if ($matches != NULL) {
                            $identificador = (Int)$matches[1];
                            $citado = DB::table('messages')->where('id',$identificador)->first();
                            $contador = DB::table('messages')->where('id',$identificador)->count();
                        }

                        $newtext = $message->texto;
                        $search = "/\[citar]([^'\"]*)\[\/citar]/iU";
                        $nuevo = preg_replace($search,"", $newtext);
                        
                    ?>

                    @if ($matches != NULL and $contador > 0) 
                        <div class="well">
                            {!!$citado->texto!!}
                        </div>
                    @endif

                    <div class="well">
                        {!!$nuevo!!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
</br>
    {!! $messages->render() !!}
<script>
function addText(event) {
    var targ = event.target || event.srcElement;
    document.getElementById("area").value += targ.textContent || targ.innerText;
    window.location.reload();
}
</script>


<div class="container">
    <div class="row">
        <div class="well">
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
        btnsDef: {
        // Customizables dropdowns
        image: {
            dropdown: ['insertImage', 'upload', 'base64','noembed'],
            ico: 'insertImage'
        }
    },
    btns: [
        ['viewHTML'],
        ['undo', 'redo'],
        ['formatting'],
        'btnGrp-design',
        ['link'],
        ['image'],
        'btnGrp-justify',
        'btnGrp-lists',
        ['foreColor', 'backColor'],
        ['preformatted'],
        ['horizontalRule'],
        ['fullscreen']
    ],

    plugins: {
        // Add imagur parameters to upload plugin
        upload: {
            serverPath: 'https://api.imgur.com/3/image',
            fileFieldName: 'image',
            headers: {
                'Authorization': 'Client-ID 9e57cb1c4791cea'
            },
            urlPropertyName: 'data.link'
        }
    }
        });
    </script>
@endsection

@endsection



