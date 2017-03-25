@extends('admin.templates.main')        

@section('title','Lista de usuarios')


@section('contenido')
    <table class="table table-bordered">
        <thread>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Email</th>
        </thread>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                    @if( $user->tipo  == "admin")
                        <span class="label label-danger">{{$user->tipo}}</span>
                    @else
                        <span class="label label-info">{{$user->tipo}}</span>
                    @endif
                    </td>
                    <td>{{ $user->email }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->render() !!}
@endsection