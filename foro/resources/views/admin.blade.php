@extends('layouts.master')

@section('content')

<div class="container">
  <div class="row">
  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#users" aria-controls="home" role="tab" data-toggle="tab">Usuarios</a></li>
    <li role="presentation"><a href="#categories" aria-controls="profile" role="tab" data-toggle="tab">Categorias</a></li>
    <li role="presentation"><a href="#threads" aria-controls="messages" role="tab" data-toggle="tab">Hilos</a></li>
    <li role="presentation"><a href="#messages" aria-controls="settings" role="tab" data-toggle="tab">Mensajes</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">


    <div role="tabpanel" class="tab-pane active" id="users">
          <br/>
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
    </div>


    <div role="tabpanel" class="tab-pane" id="categories">
        </br>
        <table class="table table-bordered">
          <thread>
            <th>ID</th>
            <th>Titulo</th>
             <th>Acción</th>
          </thread>
          <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->titulo }}</td>
                    <td>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                        <a href="{{ route('categories.destroy',$category->id)}}" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                    </td>

                </tr>
            @endforeach
          </tbody>
        </table>

        <h3>Nueva Categoria</h3>

        {!! Form::open(['route' => 'categories.store','method' => 'POST']) !!}
          <div class="input-group">
            {!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!} 

            <span class="input-group-btn">
              {!! Form::submit('Añadir',['class'=> 'btn btn-primary']) !!}
            </span>  
          </div>
        {!! Form::close() !!}

    </div>


    <div role="tabpanel" class="tab-pane" id="threads">...</div>


    <div role="tabpanel" class="tab-pane" id="messages">...</div>



  </div>
</div>
  </div>
</div>
              

            


@endsection
                                        