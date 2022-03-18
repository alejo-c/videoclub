<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Videoclub</title>
</head>

<body>

    @include('partials.navbar')
	@include('sweetalert::alert')

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
	@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>