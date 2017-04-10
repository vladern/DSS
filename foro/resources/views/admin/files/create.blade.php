 @extends('layouts.master')

@section('title','Subir Archivos')

@section('content')
<div class="container" style="margin-top:70px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Subir Archivos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('upload-images.index') }}"> Atrás</a>
            </div>
        </div>
    </div>
    {!! Form::open(array('route' => 'upload-images.store','method'=>'POST','files'=>true)) !!}
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Subir archivo:</strong>
                {!! Form::file('imagen', array('class' => 'btn btn-default btn-file')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Hecho</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection