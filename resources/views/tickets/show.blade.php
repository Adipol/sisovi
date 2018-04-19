@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header">
					<h5>Ticket</h5> 
				</div>

				<div class="card-body" >
		  		{!! Form::model($ticket,['route'=>['tickets.update',$ticket->idt],'method'=>'POST'])!!}

					<div class="form-group">
						<label for="">Codigo de Ticket</label>
						<input type="text" name="cod_name" class="form-control"  value="{{ $ticket->code_area }}" readonly >
					</div>
					
						<div class="form-group">
							<label for="">Solicitante</label>
							<input type="text" name="applicant_id" class="form-control"  value="{{ $ticket->applicant_name }}" readonly >
						</div>
 
						 <div class="form-group">
							<label>Bus</label>
							<input type="text" name="bus_id" class="form-control"  value="{{ $ticket->code }}" readonly >
				     	</div>

						 <div class="form-group">
							<label>Patio</label>
							<input type="text" name="patio_id" class="form-control"  value="{{ $ticket->pname }}" readonly >
						 </div>
					 
						 <div class="form-group">
								<label for="">Conductor</label>
								<input type="text" name="driver" class="form-control"  value="{{ $ticket->driver }}" readonly >
						</div>
	
						<div class="form-group">
								<label for="">Anfitrión</label>
								<input type="text" name="host" class="form-control"  value="{{ $ticket->host }}" readonly >
						</div>
							
						 <div class="form-group">
							<label>Grado del Incidente</label>
							<input type="text" name="lname" class="form-control"  value="{{ $ticket->lname }}" readonly >
				     	</div>

						<div class="form-group">
							<label for="">Fecha del Incidente</label>
							<input  type="date" name="incident_date" class="form-control" value="{{$ticket->incident_date->format('Y-m-d') }}" readonly>
							
						</div>
					
						<div class="form-group">
							<label for="">Detalle del Incidente</label>
							<textarea name="applicant_obs" class="form-control" readonly>{{ $ticket->applicant_obs }}</textarea>
						</div>

						<div class="form-group">
							<label for="">Observaciones</label>
							<textarea name="operational_obs" class="form-control" readonly>{{$ticket->operational_obs }}</textarea>
						</div>

						<div class="form-group">
								<a type="reset" class="btn  btn-sm btn-primary"><i class="fas fa-upload"></i>Reset</a>
						</div>				
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
