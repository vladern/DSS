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
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                        <a href="{{route('categories.destroy',$category->id)}}" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
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
          {!! $categories->render() !!}
          
        </div>
        </div>