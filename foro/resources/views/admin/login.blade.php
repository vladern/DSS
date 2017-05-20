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
				{!! Form::open(['route' => 'login','method' => 'POST']) !!}             
					<div class="form-group">
						{!! Form::label('email','Nick') !!}
						{!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email','required']) !!}             
					</div>
					<div class="form-group">
						{!! Form::label('password','Password') !!}
						{!! Form::password('password',  ['class'=>'form-control','placeholder'=>'*************','required']) !!}             
					</div>
					<div class="form-group">
						{!! Form::submit('Login',['class'=> 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
			</div>
	</div>
</div>


@endsection