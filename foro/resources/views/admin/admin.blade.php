@extends('layouts.master')
@section('title','Administrador')
@section('content')
<div class="container">
  <div class="row">
  </br>
  </br>
  </br>
   @include('admin.tabUser')
   @include('admin.tabCategories')
@endsection
                                        