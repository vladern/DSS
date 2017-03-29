@extends('layouts.master')
@section('title','Lista hilos')
@section('content')
    </br>
    </br>
    </br>
    <div class="panel panel-default">
	<div class="panel-heading"><h3 class="panel-title"><strong>Lista de hilos</strong></h3>
    </br>
    @include('flash::message')
    <table class="table table-bordered">
        <thread>
        <th>ID</th>
        <th>Descripcion</th>
        <th>Usuario</th>
        <th>Categoria</th>
        <th>Acción</th>
        </thread>
          <tbody>
            @foreach($threads as $thread)
                <tr>
                    <td>{{ $thread->id }}</td>
                    <td>{{ $thread->descripcion }}</td>
                    <td>{{ $thread->user}}</th>
                    <td>{{ $thread->category->titulo}}</td>
                    <td>
                        <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                        <a href="{{route('thread.destroy',$thread->id)}}" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    @endsection