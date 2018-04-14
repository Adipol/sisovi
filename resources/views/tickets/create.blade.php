@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header">
					<h5>Crear Nuevo Ticket</h5> 
				</div>
								
				@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<div class="card-body">
					{!! Form::open(['route'=>'tickets.store']) !!}
					
						<div class="form-group">
							<label for="">Solicitante</label>
							<input type="text" name="applicant_id" class="form-control" value="{{ $applicant->name }}" readonly >
						</div>

						<div class="form-group">
							<label>Area</label>
							<select name="area" class="form-control">
						
							  <option value="">Seleccione Area</option>
							  @foreach($areas as $area)
								<option value="{{ $area->abreviation }}">{{ $area->name}}</option>
								@endforeach
							</select>
				     	</div>

						 <div class="form-group">
							<label>Bus</label>
							<select name="bus_id" class="form-control">
								
							  <option value="">Seleccione Bus</option>
							  @foreach($buses as $bus)
								<option value="{{ $bus->id }}">{{ $bus->code}}</option>
								@endforeach
							</select>
				     	</div>

						 <div class="form-group">
							<label>Patio</label>
							<select name="patio" class="form-control">
							  <option value="">Seleccione Patio</option>
							  @foreach($patios as $patio)
								<option value="{{ $patio->id }}">{{ $patio->name }}</option>
								@endforeach
							</select>
						 </div>
						 
						 <div class="form-group">
								<label for="">Conductor</label>
								<input type="text" name="driver" class="form-control">{{ old ('driver') }}</input>
						</div>

						<div class="form-group">
								<label for="">Anfitrión</label>
								<input type="text" name="host" class="form-control">{{ old ('host') }}</input>
						</div>
							
						 <div class="form-group">
							<label>Grado del Incidente</label>
							<select name="level_id" class="form-control">
							  <option value="">Seleccione Grado</option>
							  @foreach($levels as $level)
								<option value="{{ $level->id }}">{{ $level->name}}</option>
								@endforeach
							</select>
				     	</div>

						<div class="form-group">
							<label for="">Fecha del Incidente</label>
							<input  type="date" name="incident_date" class="form-control" value="{{ old('incident_date',date('Y-m-d'))}}">
						</div>
						
						<div class="form-group">
							<label for="">Detalle del Incidente</label>
							<textarea name="applicant_obs" class="form-control">{{ old ('applicant_obs') }}</textarea>
						</div>

						<div class="form-group">
								<button  class="btn btn-primary"><i class="fas fa-plus-circle"></i> Registrar Ticket</button>
						</div>
						
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection()
