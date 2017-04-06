@extends('layouts.master')

@section('title','Editar Usuario ')

@section('content')

 <div class="container" style="margin-top:70px">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>Editar Usuario {{$user->name}}</strong></h3>     
        </div>
            <div class="panel-body">

            <section>             
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
                    {!! Form::select('type',[''=>'Selecione una opción','member'=>'miembro','admin'=>'administrador'],null,['class'=>'form-control']) !!}
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