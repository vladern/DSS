<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Default')</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
</head>
<body>
    @include('admin.templates.partials.nav')
    <div class="container" style="margin-top:70px">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong> @yield('title','Default')</strong></h3>
            
            </div>
            <div class="panel-body">
                <section>
                    @yield('contenido')         
                </section>
            </div>
        </div>
    </div>
    <footer>
        <div class="col-lg-12">
            <p>Copyright &copy; Foro DSS 2017</p>
        </div>
    </footer>
    <script src="{{asset('plugins/jquery/js/jquery-3.2.0.slim.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/botstrap.js')}}"></script>

</body>
</html>