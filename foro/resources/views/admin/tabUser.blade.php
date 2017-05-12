@extends('layouts.tab')
  </br>
    <div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><strong>Admin Users</strong></h3>
            <br/>
            @include('admin/errors')
            @include('flash::message')
            <table class="table table-bordered">
            <thread>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Acción</th>
            </thread>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->apellidos}}</td>
                        <td>
                        @if( $user->tipo  == "admin")
                            <span class="label label-danger">{{$user->tipo}}</span>
                        @else
                            <span class="label label-info">{{$user->tipo}}</span>
                        @endif
                        </td>
                        <td>{{ $user->email }} </td>
                        <td>
                            <a href="{{route('users.edit',$user->id)}}" target="_parent" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                            <a href="{{route('users.destroy',$user->id)}}" target="_parent" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->render() !!}


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
    </div>