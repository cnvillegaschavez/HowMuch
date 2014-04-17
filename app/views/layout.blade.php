<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to [How Much]</title>
		
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{ url('css/styles.css') }}" rel="stylesheet">
		<link href="{{ url('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">		 
		<link href="{{ url('/vendor/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
		@yield('styles')
	</head>
	<body>
		<header>
			
		</header>
		
		<div>
			@yield('content')
		</div>
		
		<footer>
		Copyright 2014
		</footer>
		
		<script type="text/javascript">
	        var root = '{{url("/")}}';
	    </script>
	    <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
	    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	    <script type="text/javascript" src='{{ url("/vendor/selectize/js/standalone/selectize.min.js") }}'></script>
	    <script type="text/javascript" src='{{ url("js/main.js") }}'></script>
	    @yield('scripts')
	</body>
</html>