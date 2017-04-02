<link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
@extends('layouts.master')
@section('title','Login')
@section('content')

 <div class="container" style="margin-top:70px">
	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><strong>Login</strong></h3>  	   
			</div>
				<div class="panel-body">
				<section>             
				<div class="form-group">
					{!! Form::label('nick','Nick') !!}
					{!! Form::text('nick',null,['class'=>'form-control','placeholder'=>'Nick','required']) !!}             
				</div>
				<div class="form-group">
					{!! Form::label('password','Password') !!}
					{!! Form::password('password',  ['class'=>'form-control','placeholder'=>'*************','required']) !!}             
				</div>
			</div>
	</div>
</div>


@endsection