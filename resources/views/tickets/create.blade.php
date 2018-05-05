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
		
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="">Solicitante</label>
							<input type="text" name="applicant_id" class="form-control" value="{{ $applicant->name }}" readonly >
						</div>
						<div class="form-group col-12 col-md-6">
							<label>Area</label>
							<select name="area_id" class="form-control">
							 	 	<option value="">Seleccione Area</option>
							  	@foreach($areas as $id => $area)
									<option {{  old('area_id') === $id ? 'selected' : '' }} value="{{ $id }}">{{ $area }}</option>
								@endforeach
							</select>
						 </div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label>Bus</label>
							<select name = "bus_id" class = "form-control">
								<option value = "">Seleccione Bus</option>
							@foreach($buses as $id => $bus )
								<option {{ (int) old('bus_id') === $id ? 'selected' : '' }} value = "{{ $id }}">{{ $bus }}</option>
							@endforeach
							</select>
						 </div>
						 <div class="form-group col-12 col-md-6">
							<label>Patio</label>
							<select name = "patio_id" class = "form-control">
							  <option value = "">Seleccione Patio</option>
							  @foreach($patios as $id => $patio)
								<option {{ (int) old('patio_id') === $id ? 'selected' : '' }} value = "{{ $id }}">{{ $patio }}</option>
								@endforeach
							</select>
						 </div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label>Grado del Incidente</label>
							<select name="level_id" class="form-control">
							  <option value="">Seleccione Grado</option>
							  @foreach($levels as $id => $level )
								<option {{ (int) old('level_id') === $id ? 'selected' : '' }} value="{{ $id }}">{{ $level }}</option>
								@endforeach
							</select>
				     	</div>
						<div class="form-group col-12 col-md-6">
							<label for="">Fecha del Incidente</label>
							<input  type="date" name="incident_date" class="form-control" value="{{ old('incident_date',date('Y-m-d'))}}">
						</div>
					</div>	
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="">Conductor</label>
							<input type="text" name="driver" class="form-control">{{ old ('driver') }}</input>
					    </div>
						<div class="form-group col-12 col-md-6">
								<label for="">Anfitrión</label>
								<input type="text" name="host" class="form-control">{{ old ('host') }}</input>
						</div>
					</div>
						<div class="form-group">
							<label for="">Detalle del Incidente</label>
							<textarea name="applicant_obs" class="form-control">{{ old ('applicant_obs') }}</textarea>
						</div>

						<div class="form-group">
								<button  class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Registrar Ticket</button>
								<a href="{{ route('tickets.index') }}" title="Reenviar ticket" class="btn  btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Cancelar</a>
						</div>
						
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection()
