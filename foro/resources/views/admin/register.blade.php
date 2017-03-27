@extends('layouts.master')

@section('title','Registrarse')

@section('content')
 <div class="container" style="margin-top:70px">
<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title"><strong>Registrarse</strong></h3>
    </div>
        <div class="panel-body">
        <section>
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
                </section>
            </div>
</div>
</div>
@endsection