<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ Config::get('app.title') }}</title>
	<link rel="stylesheet" href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}">

	@if(!empty($bootstrapdialog))
	<link rel="stylesheet" href="{{ asset('assets/lib/bootstrap-dialog/bootstrap-dialog.min.css') }}">
	@endif

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
	<script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
	
	@if(!empty($handlebars))
	<script src="{{ asset('assets/js/handlebars.min.js') }}"></script>
	@endif

	@if(!empty($bootstrapdialog))
	<script src="{{ asset('assets/lib/bootstrap-dialog/bootstrap-dialog.min.js') }}"></script>
	@endif

	@if(!empty($quizcreator))
	<script src="{{ asset('assets/js/quiz-creator.js') }}"></script>
	@endif

	@if(!empty($viewclass))
	<script src="{{ asset('assets/js/class.js') }}"></script>
	@endif
</body>
</html>