 <link href="css/subirarchivo.css" rel="stylesheet">
@extends('layouts.master')

@section('content')
<!-- Page Content -->
    </br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead">Categorias</p>
                <div class="list-group">
                
                @foreach($categories as $category)
                    <a href="#" class="list-group-item">{{$category->titulo}}</a>
                @endforeach
                </div>
            </div>
            <div class="col-md-9">
                
                <br/>
                <br/>
                <!-- Posted Comments --> 
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-circle img-responsive img-center" src="https://yt3.ggpht.com/-ZFXH0VqNE3M/AAAAAAAAAAI/AAAAAAAAAAA/tCv9jhjaCTk/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" width="64" height="64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <br/>
                <!-- Comment -->
              <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-circle img-responsive img-center" src="https://yt3.ggpht.com/-AboeDafmeAA/AAAAAAAAAAI/AAAAAAAAAAA/sjg0Dq_o4mQ/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" width="64" height="64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <br/>
                <!-- Comment -->
              <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-circle img-responsive img-center" src="https://yt3.ggpht.com/-ZFXH0VqNE3M/AAAAAAAAAAI/AAAAAAAAAAA/tCv9jhjaCTk/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" width="64" height="64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <br/>

                 <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>

                        <br/>
                        <div class="form-group">
                            <label>Subir archivos</label>
                            <div class="input-group">
                                <input placeholder="" type="text" class="form-control carga-archivo-filename" disabled="disabled">
                                <!-- don't give a name === doesn't send on POST/GET -->
                                <span class="input-group-btn"> 
                                    <!-- image-preview-input -->
                                    <div class="btn btn-default carga-archivo-input"> 
                                        <span class="glyphicon glyphicon-folder-open"></span>
                                        <span class="carga-archivo-input-title">Seleccionar archivo</span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                                        <!-- rename it -->
                                    </div>
                                 </span>
                            </div>
                        </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection


    






