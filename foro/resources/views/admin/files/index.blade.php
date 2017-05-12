@extends('layouts.tab')
  </br>
    <div class="panel panel-default">
	<div class="panel-heading"><h3 class="panel-title"><strong>Lista de archivos</strong></h3>
    </br>
    @include('flash::message')
    <table class="table table-bordered">
        <thread>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ruta</th>
            <th>Imagen</th>
            <th>Acción</th>
        </thread>
        <tbody>
    @foreach ($images as $img)
    <tr>
        <td>{{ $img->id }}</td>
        <td>{{ $img->nombre }}</td>
        <td>{{ $img->ruta }}</td>
        <td>
            <a href='{{ asset("images/$img->imagen") }}'>{{ $img->imagen }}</a>
        </td>
        <td>
            <a href="{{route('images.destroy',$img->id)}}" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
        </td>
    </tr>
    @endforeach
     </table>
     </tbody>

    </div>
                <a class="btn btn-success btn-lg btn-block" href="{{ route('upload-images.create') }}">Subir Archivo</a>
    </div>
   
      {!! $images->render() !!}
