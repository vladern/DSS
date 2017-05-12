<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title','Default')</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	<!-- Container -->
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Foro DSS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        @if(Auth::user()->tipo=='admin')
                        <li>
                            <a href="/admin">Administrar</a>    
                        </li>
                        @endif
                    @endif 
                    <li>
                        <a href="{{ route('categories.index') }}">Categorias</a>    
                    </li>   
                </ul>

                @if(Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('users.memberData',Auth::user()->id)}}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</a></li>
                        <li><a href="{{ route('exit') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>              
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('create') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                @endif



            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
    	@yield('content')
    </div>



    <!-- /.container -->
    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2017</p>
                </div>
            </div>
        </footer>
    </div>
       
</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script {{asset('js/bootstrap.min.js')}}></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
    @yield('js')
</html>
