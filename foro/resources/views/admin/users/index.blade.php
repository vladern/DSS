@extends('admin.templates.main')        

@section('title','Lista de usuarios')


@section('contenido')
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
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                        <a href="{{ route('users.destroy',$user->id)}}" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->render() !!}
@endsection