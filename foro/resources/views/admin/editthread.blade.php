@extends('layouts.master')

@section('title','Editar Hilo ')

@section('content')

 <div class="container" style="margin-top:70px">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>Editar Hilo {{$thread->descripcion}}</strong></h3>     
        </div>
        <div class="panel-body">
 		<section>    
 		{!! Form::open(['route' => ['thread.update',$thread->id],'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('category_id','Categorias') !!}
                    {!! Form::select('category_id',$categories,null,['class'=>'form-control select-categorie','placeholder'=>'Seleccione una categoría','required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('descripcion','Descripcion') !!}
                    {!! Form::text('descripcion',$thread->descripcion,['class'=>'form-control','placeholder'=>'Descripcion','required']) !!}             
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