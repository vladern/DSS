@extends('layouts.master')

@section('title','Crear Hilo')

@section('content')
    </br>
    </br>
    </br>
    <div class="panel panel-default">
	<div class="panel-heading"><h3 class="panel-title"><strong>Crear un Hilo</strong></h3>
    </br>
    {!! Form::open(['route' => 'thread.store','class'=>'form','method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('category_id','Categorias') !!}
            {!! Form::select('category_id',$categories,null,['class'=>'form-control select-category','placeholder'=>'Seleccione una categoría','required']) !!}
        </div>
        <div class="form-group">    
            {!! Form::label('descripcion','Descripción') !!}
            {!! Form::text('descripcion',null,['class'=>'form-control','placeholder' => 'Descripción del hilo','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Crear hilo',['clas'=>'btn btn-default']) !!}
        </div>
    {!! Form::close()!!}
    </div>
    </div>

@endsection
@section('js')
    <script>
        $('.select-category').chosen(
        {
            no_results_text: "Oops,no se encontrado nada!",
            width: "100%",
            search_contains:true
        });
    </script>
@endsection