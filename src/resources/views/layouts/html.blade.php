<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{asset('packages/h34/core/css/normalize.css')}}" rel="stylesheet">
    <link href="{{asset('packages/h34/core/css/foundation.min.css')}}" rel="stylesheet">
    <link href="{{asset('packages/h34/core/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('packages/h34/core/css/foundation-icons/foundation-icons.css')}}" rel="stylesheet">
	{{-- <link href="/css/banner-theme.css" rel="stylesheet"> --}}
	@yield('stylesheet')

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="{{ asset('packages/h34/core/js/vendor/modernizr.js') }}"></script>
</head>
<body>
	<nav class="top-bar" data-topbar role="navigation">
	  <ul class="title-area">
	    <li class="name">
	      <h1><a href="#">My Site</a></h1>
	    </li>
	     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  </ul>

	  <section class="top-bar-section">
	    <!-- Right Nav Section -->
	    <ul class="right">
	      @if (Auth::guest())
	      	<li><a href="/auth/login">Iniciar sesión</a></li>
			<!--<li><a href="/auth/register">Crear una cuenta</a></li>-->
	      @else
		      <li class="has-dropdown">
		        <a href="#">User: {{ Auth::user()->name }}</a>
		        <ul class="dropdown">
		          <li><a href="#">First link in dropdown</a></li>
		          <li class="active"><a href="#">Active link in dropdown</a></li>
		          <li><a href="/auth/logout">Cerrar sesión</a></li>
		        </ul>
		      </li>
		  @endif
	    </ul>

	    <!-- Left Nav Section -->
	    <ul class="left">
	      <li><a href="/">Inicio</a></li>
	    </ul>
	  </section>
	</nav>

	@yield('body')
	<input id="csrftoken" type="hidden" value="{{ csrf_token() }}">
	<!-- Scripts -->

	<script type="text/javascript" src="{{ asset('packages/h34/core/js/vendor/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('packages/h34/core/js/vendor/fastclick.js') }}"></script>
	<script type="text/javascript" src="{{ asset('packages/h34/core/js/foundation.min.js') }}"></script>
	<script type="text/javascript">
		$(document).foundation();
	</script>
	<script type="text/javascript" src="{{ asset('packages/h34/core/js/init.js') }}"></script>
	@yield('javascript')
</body>
</html>
