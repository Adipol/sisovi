<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SISOVI') }}</title>
    <!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> 
    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/boots.css')}}">
	<link rel="stylesheet" href="{{ asset('css/fa.css') }}">

</head>
<body>
	@include('partials.navigation')
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
	</div>
	
	<!-- Scripts -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	@stack('scripts')
</body>
</html>
