@extends('layouts.tab')
    </br>
    <div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><strong>Admin categories</strong></h3>
        </br>
        <table class="table table-bordered">
          <thread>
            <th>ID</th>
            <th>Titulo</th>
            <th>Usuario</th>
            <th>Acción</th>
          </thread>
          <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->titulo }}</td>
                    <td>{{ $category->user->name}}</th>
                    <td>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning" target="_parent"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                        <a href="{{route('categories.destroy',$category->id)}}" target="_parent" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                    </td>

                </tr>
            @endforeach
          </tbody>
        </table>         
          {!! $categories->render() !!}
          
        </div>
        </div>