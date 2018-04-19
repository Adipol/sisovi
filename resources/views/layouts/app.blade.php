<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> 
    <!-- Fonts -->
  	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> 

    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/boots.css')}}">
	<link rel="stylesheet" href="{{ asset('css/fa.css') }}">
	
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
				@if(auth()->check())
					<ul class="navbar-nav mr-auto">	
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="fas fa-pencil-alt"></i> Registrar<span class="caret"></span></a>
							    <div class="dropdown-menu" >

									<a class="dropdown-item" href="{{ route('areas.index') }}"><i class="fas fa-diagnoses"></i> Areas</a>
									<a class="dropdown-item" href="{{ route('buses.index')}}"><i class="fas fa-bus"></i> Buses</a>
									<a class="dropdown-item" href="{{ route('patios.index') }}"><i class="fas fa-warehouse"></i> Patios</a>
								    <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-users"></i> Usuarios</a>
		
								</div>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="{{ route('tickets.index')}}"><i class="fas fa-ticket-alt"></i> Tickets</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="#"><i class="fas fa-folder"></i> Tickets Archivados</a>
							</li>	
					</ul>
					@endif
                   <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
													 <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
					</ul>
					
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
	</div>
	
	<!-- Scripts -->
	{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="{{ asset('js/fontawesome-all.js') }}"></script>

</body>
</html>
