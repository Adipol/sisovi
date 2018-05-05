<li class="nav-item"><a class="nav-link" href="{{ route('tickets.index') }}"><i class="fas fa-ticket-alt"></i> {{ __("Tickets") }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('tickets.finished') }}"><i class="fas fa-folder"></i> {{ __("Tickets Finalizados") }}</a></li>
@include('partials.navigations.logged')