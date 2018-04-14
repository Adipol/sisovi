@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 ">
			<div class="card">
				<div class="card-header">
					<h2>Tickets</h2>
				</div>
				<div class="card-body">
				     <a href="{{ route('tickets.create') }}" class="btn btn-primary" style="margin-botton: 15px;"><i class="fas fa-plus-circle"></i> Crear Ticket</a>
					<hr>
					<div class="alert-custom">
						@if (session('notification'))
							<div class="alert alert-success">
								{{ session('notification')}}
							</div>
						@endif
				
						@if (count($errors)>0)
							<div class="alert alert-danger">
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
									<th>Demora de Ticket</th>
									<th>Estado de Ticket</th>
									<th width="130px">Opción</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tickets as $key=>$ticket)
										<tr @if($ticket->level_name=='Normal' && $ticket->code_id==2 ) 
												class="table-success"
											@else
												@if($ticket->level_name=='Alto' && $ticket->code_id==1)
													class="table-danger"
													@else
													@if($ticket->level_name=='Alto' && $ticket->code_id==2)
													   class="table-success"
													   @endif
												 @endif 
											@endif>
											
											<td style="padding-left:15px;">{{ $key+1 }}</td>
											<td>{{ $ticket->code_area }}</td>
											<td>{{ $ticket->level_name }}</td>
											<td>{{ $ticket->applicant_name }} </td>
											<td>{{ $ticket->patio_name }}</td>
											<td>{{ $ticket->incident_date->formatLocalized('%A %d %B %Y')}}</td>
											<td>{{ $ticket->created_at->formatLocalized('%A %d %B %Y')}}</td>

											<td>@if($ticket->code_id==2 || $ticket->code_id==3 )Finalizado @else {{$ticket->created_at->diffForHumans()}} @endif </td>
											
											<td>{{ $ticket->code_name }}</td>
											<td>
											    <a href="{{ route('tickets.edit',$ticket->id) }}" title="Subir archivo" class="btn  btn-sm btn-success"><i class="fas fa-upload"></i></a>	
												<a href="" title="Descargar archivo" class="btn btn-sm  btn-warning">
													<i class="fas fa-download"></i>
												</a>
								
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							{{ $tickets->render()}}
						</div>
					</div>
			    </div>
		</div>
	</div>
</div>
@endsection()

