@extends('layouts.master')

@section('title','Editar Categoria ')

@section('content')

 <div class="container" style="margin-top:70px">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>Editar Categoria {{$category->titulo}}</strong></h3>     
        </div>
        <div class="panel-body">
 		<section>             
            {!! Form::open(['route' => ['categories.update',$category->id],'method' => 'PUT']) !!}
                <div class="input-group">
                    {!! Form::text('titulo',$category->titulo,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}             
               

                <span class="input-group-btn">
                    {!! Form::submit('Modificar',['class'=> 'btn btn-primary']) !!}
                </span>  
                </div>
            {!! Form::close() !!}
		</section>
        </div>
    </div>
</div>

@endsection
