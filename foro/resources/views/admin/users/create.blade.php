@extends('admin.templates.main')

@section('title','Crear usuario')

@section('contenido')

   {!! Form::open(['route' => 'users.store','method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}             
        </div>
        <div class="form-group">
            {!! Form::label('apellidos','Apellidos') !!}
            {!! Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'Apelldos','required']) !!}             
        </div>
        <div class="form-group">
            {!! Form::label('nick','Nick') !!}
            {!! Form::text('nick',null,['class'=>'form-control','placeholder'=>'Nick','required']) !!}             
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com','required']) !!}             
        </div>
        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',  ['class'=>'form-control','placeholder'=>'*************','required']) !!}             
        </div>
        <div class="form-group">
            {!! Form::submit('Registrarse',['class'=> 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection