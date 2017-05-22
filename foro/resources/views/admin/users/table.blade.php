    @extends('layouts.tab')
      {!! Form::open(['route' => array('search','.name','.lastname'),'method' => 'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}
      <div class="form-group">
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
        {!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Apellidos'])!!}
      </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      {!! Form::close()!!}
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
    </div>
    </div>