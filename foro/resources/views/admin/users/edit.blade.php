@extends('admin.templates.main')

@section('title','Editar usuario ' . $user->name .' '. $user->apellidos)

@section('contenido')

   {!! Form::open(['route' => ['users.update',$user->id],'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}             
        </div>
        <div class="form-group">
            {!! Form::label('apellidos','Apellidos') !!}
            {!! Form::text('apellidos',$user->apellidos,['class'=>'form-control','placeholder'=>'Apelldos','required']) !!}             
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
            {!! Form::select('type',[''=>'Selecione una opción','normal'=>'normal','admin'=>'administrador'],null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('editar',['class'=> 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection