<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   
    <!-- Fonts -->
  	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> 

    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/boots.css')}}">
	<link rel="stylesheet" href="{{ asset('css/fa.css') }}">
	<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
	
</head>
<body>
	@include('partials.navigation')
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
	</div>
	
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script> 
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="{{ asset('js/fontawesome-all.js') }}"></script>
	@stack('scripts')
</body>
</html>
