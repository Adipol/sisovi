@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 ">
			<div class="card">
				<div class="card-header">
					<h2>Tickets Finalizados</h2>
				</div>
				<div class="card-body">
					<hr>
					<div class="alert-custom">
						@if (session('notification'))
							<div class="alert alert-success">
								{{ session('notification')}}
							</div>
						@endif
						@if (count($errors)>0)
							<div class="alert alert-warning">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
					</div>
						<div class="table-responsive">  
						<table class="table table-hover table-striped">
								<thead class="thead-light">
									<tr>
									<th>#</th>
									<th>Código de Ticket</th>
									<th>Grado</th>
									<th>Solicitante</th>
									<th>Patio</th>
									<th>Fecha de Incidente</th>
									<th>Fecha de Solicitud</th>
									<th>Estado de Ticket</th>
									<th width="130px">Opción</th>
									</tr>
								</thead>
								<tbody>
									@forelse($tickets as $key=>$ticket)
										<tr>
											<td style="padding-left:15px;">{{ $key+1 }}</td>
											<td>{{ $ticket->code_area }}</td>
											<td>{{ $ticket->level_name }}</td>
											<td>{{ $ticket->applicant_name }} </td>
											<td>{{ $ticket->patio_name }}</td>
											<td>{{ $ticket->incident_date->formatLocalized('%A %d %B %Y')}}</td>
											<td>{{ $ticket->created_at->formatLocalized('%A %d %B %Y')}}</td>
											<td>{{ $ticket->code_name }}</td>
											<td>
													<a href="{{ route('tickets.showf',$ticket->id) }}" title="Ver ticket" class="btn  btn-sm btn-success"><i class="fas fa-eye"></i></a>
											</td>
										</tr>
										@empty
										<tr><td colspan="9" style="text-align: center;">Sin registros</td></tr>
									@endforelse
								</tbody>
							</table>
						</div>
						<div class="row justify-content-center">
							{{ $tickets->links() }}
						</div>
					</div>
			    </div>
		</div>
	</div>
</div>
@endsection()


