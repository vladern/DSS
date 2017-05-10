@extends('layouts.tab')
 </br>
    <div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><strong>Lista de mensajes</strong></h3>
        </br>
        <table class="table table-bordered">
          <thread>
            <th>ID</th>
            <th>Contenido</th>
            <th>Autor</th>
            <th>Hilo</th>
            <th>Acción</th>
          </thread>
          <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->texto }}</td>
                    <td>{{ $message->user->name }}</td>
                    <td>{{ $message->thread->descripcion }}</td>
                    <td>
                        <a href="{{route('message.destroy',$message->id)}}" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                    </td>

                </tr>
            @endforeach
          </tbody>
        </table>
        {!! $messages->render() !!}
        </div>
        </div>