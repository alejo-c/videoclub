<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Videoclub</title>
	@notifyCss
	<link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
	@include('partials.navbar')

	<div class="container-sm">
		@yield('content')
	</div>

	<script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<x:notify-messages />
	@notifyJs
</body>

</html>