<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-pencil-alt"></i> {{ __("Administrar") }}<span class="caret"></span></a>
		<div class="dropdown-menu" >
			<a class="dropdown-item" href="{{ route('areas.index') }}"><i class="fas fa-diagnoses"></i> {{ __("Areas") }}</a>
			<a class="dropdown-item" href="{{ route('buses.index')}}"><i class="fas fa-bus"></i> {{ __("Buses") }}</a>
			<a class="dropdown-item" href="{{ route('patios.index') }}"><i class="fas fa-warehouse"></i> {{ __("Patios") }}</a>
			<a class="dropdown-item" href="{{ route('atickets.index') }}"><i class="fas fa-ticket-alt"></i> {{ __("Tickets") }}</a>
			<a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-users"></i> {{ __("Usuarios") }}</a>
		</div>
</li>		
<li class="nav-item"><a class="nav-link" href="{{ route('tickets.index') }}"><i class="fas fa-ticket-alt"></i> {{ __("Tickets") }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('tickets.indexfinished') }}"><i class="fas fa-folder"></i> {{ __("Tickets finalizados") }}</a></li>

@include('partials.navigations.logged')