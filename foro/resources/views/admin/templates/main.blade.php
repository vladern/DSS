<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo','Default')</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
</head>
<body>
    @include('admin.templates.partials.nav')
    <div class="container">
        <section>
            @yield('contenido')
        </section>

        <footer>
            <div class="col-lg-12">
                <p>Copyright &copy; Foro DSS 2017</p>
            </div>
        </footer>
    </div>
    <script src="{{asset('plugins/jquery/js/jquery-3.2.0.slim.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/botstrap.js')}}"></script>

</body>
</html>