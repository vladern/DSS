@extends('layouts.master')
@section('title','Administrador')
@section('content')
<div class="container">
  <div class="row">
  </br>
  </br>
  </br>
   <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
</ul>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
      @include('admin.tabUser')
  </div>
  <div id="menu1" class="tab-pane fade">
      @include('admin.tabCategories')
  </div>
  </div>
@endsection
                                        