<!DOCTYPE html>
<html lang="en" ng-app="Application">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador de Enlaces</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/home/') }}">
					Inicio
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					
                    <li><a href="{{url('/perfil')}}">R.Humanos</a></li>
                    <li><a href="{{url('/monitoring')}}">E.V. y Seguimiento</a></li>
                    <li><a href="#">Gastos</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inventario <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/equipment') }}">Equipo</a></li>
                            <li><a href="{{ url('auto')}}">Autos</a></li>
                            <li><a href="{{ url('servicio') }}">Servicio</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Opciones <span class="caret"></span></a>
                    	<ul class="dropdown-menu" role="menu">
                		 	<li><a href="{{ url('/pages/directory') }}">Directorio</a></li>
		                    <li><a href="{{url('/maps') }}">Alcance</a></li>
		                    <li><a href="#">Documentos</a></li>
		                    <li><a href="#">C.N.C.H</a></li>
		                    <li><a href="">GPS</a></li>
		                    <li><a href="#">Preguntas</a></li>
                    	</ul>
                    </li>
				</ul>
					
				<ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Ingresar</a></li>

					@else
						<li class="dropdown">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} {{Auth::User()->lastname }}<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Salir</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>

		</div>
	</nav>
    <!-- Content section -->
    <div class="container">
        <!--flash message -->
        @include('flash::message')
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <h3 id="time" class="text-right"></h3>
            <p class="text-muted">&copy Congregación Mariana Trinitaria 2015 </p>

        </div>
    </footer>
	<!-- Scripts -->

    <script src="{{ asset('/bower_components/angular/angular.js') }}"></script>
    <script src="{{asset('/bower_components/angular-ui-utils/ui-utils.js')}}"></script>
	<script src="{{asset('bower_components/angular-ui-map/ui-map.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/time.js') }}"></script>
</body>
</html>
