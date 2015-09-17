<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ Config::get('app.title') }}</title>
	<link rel="stylesheet" href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
	<header>	
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      
		      <a class="navbar-brand" href="/">
		      	<img src="{{ asset('assets/img/logo.png') }}" id="logo" alt="logo">
		      	Shotgun
		      </a>
		    </div>
		  </div>
		</nav>
	</header>

	<div class="container">
		@yield('content')
	</div>
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/quiz.js') }}"></script>
</body>
</html>