@extends('admin.templates.main')

@section('titulo','Crear usuario')

@section('contenido')

   {!! Form::open(['route'=> 'admin.users.store','method'=>'POST']) !!}*/
        <div class="form-group">
            {!! Form::lable('Nombre') !!}
        </div>
    {!! Form::close() !!}

@endsection