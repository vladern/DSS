@extends('layouts.master')

@section('title','Editar Usuario ')

@section('content')

 <div class="container" style="margin-top:70px">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>Editar Usuario {{$user->name}}</strong></h3>     
        </div>
            <div class="panel-body">
            </br>

            <?php
                $contador = DB::table('images')->where('user_id',$user->id)->count();

                if ($contador == 0) {
                    $icono = "default.jpg";
                }
                else {
                    $fotoperfil = DB::table('images')->where('user_id',$user->id)->orderby('id','desc')->first();
                    $icono = $fotoperfil->imagen;
                }
            ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-3">
        <img src="/images/{{$icono}}" class="img-responsive img-circle" alt="Cinque Terre" width="200" height="200">
    </div>
    <div class="col-xs-4">
        {!! Form::open(array('route' => 'upload-images.store','method'=>'POST','files'=>true)) !!}
      <div class="row">

            <div class="form-group">
                <strong>Nombre Imagen:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'Nombre Imagen','class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                <strong>Subir archivo:</strong>
                {!! Form::file('imagen', array('class' => 'btn-file')) !!}
            </div>
            <button type="submit" class="btn btn-primary">Hecho</button>
    </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

            </br>
            </br>
            <section>             
            {!! Form::open(['route' => ['users.update',$user->id],'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}             
                </div>
                <div class="form-group">
                    {!! Form::label('apellidos','Apellidos') !!}
                    {!! Form::text('apellidos',$user->apellidos,['class'=>'form-control','placeholder'=>'Apellidos','required']) !!}             
                </div>
                <div class="form-group">
                    {!! Form::label('nick','Nick') !!}
                    {!! Form::text('nick',$user->nick,['class'=>'form-control','placeholder'=>'Nick','required']) !!}             
                </div>
                <div class="form-group">
                    {!! Form::label('email','Email') !!}
                    {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'example@gmail.com','required']) !!}             
                </div>
                <div class="form-group">
                    {!! Form::label('tipo','Tipo Usuario') !!}
                    {!! Form::select('type',[''=>'Selecione una opción','member'=>'miembro','admin'=>'administrador'],null,['class'=>'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('editar',['class'=> 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            </section>

        </div>
    </div>
</div>

@endsection