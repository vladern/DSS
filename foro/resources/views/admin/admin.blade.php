@extends('layouts.master')
@section('title','Administrador')
@section('content')
<div class="container">
  <div class="row">
  </br>
  </br>
  </br>
   <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Usuarios</a></li>
  <li><a data-toggle="tab" href="#menu1">Categorias</a></li>
   <li><a data-toggle="tab" href="#menu2">Hilos</a></li>
   <li><a data-toggle="tab" href="#menu3">Mensajes</a></li>
   <li><a data-toggle="tab" href="#menu4">Imágenes</a></li>
</ul>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
     <iframe src="/admin/tabUser" scrolling="no" width="100%" height="450px" frameBorder="0">
     </iframe>
     <h3>Buscar</h3>
          {!! Form::open(['route' => 'users.index','method' => 'GET']) !!}
            <div class="input-group">
              {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!} 

              <span class="input-group-btn">
                {!! Form::submit('Buscar',['class'=> 'btn btn-primary']) !!}
              </span>  
            </div>
          {!! Form::close() !!}
          <br>
          {!! Form::open(['route' => 'users.index','method' => 'GET']) !!}
            <div class="input-group">
              {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!} 

              <span class="input-group-btn">
                {!! Form::submit('Buscar',['class'=> 'btn btn-primary']) !!}
              </span>  
            </div>
          {!! Form::close() !!}
  </div>
  <div id="menu1" class="tab-pane fade">
     <iframe src="/admin/tabCategories" scrolling="no" width="100%" height="400px" frameBorder="0">
     </iframe>
     <h3>Nueva Categoria</h3>
          {!! Form::open(['route' => 'categories.store','method' => 'POST']) !!}
            <div class="input-group">
              {!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!} 

              <span class="input-group-btn">
                {!! Form::submit('Añadir',['class'=> 'btn btn-primary']) !!}
                 
              </span>  
            </div>
          {!! Form::close() !!}
  </div>
    <div id="menu2" class="tab-pane fade">
      <iframe src="/admin/threads/index" scrolling="no" width="100%" height="550px" frameBorder="0">
      </iframe>
    </div>
    <div id="menu3" class="tab-pane fade">
      <iframe src="/admin/messages/tabMessages" scrolling="no" width="100%" height="550px" frameBorder="0">
      </iframe>
    </div>
    <div id="menu4" class="tab-pane fade">
      @include('admin.files.index')
    </div>
</div>
@endsection
                                        