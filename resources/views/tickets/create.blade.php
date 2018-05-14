@extends('layouts.app') @section('content')

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
							<input type="text" name="applicant_id" class="form-control" value="{{ $applicant->name }}" readonly>
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="">Fecha del Incidente</label>
							<input type="date" name="incident_date" class="form-control" value="{{ old('incident_date',date('Y-m-d'))}}">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label>Conductor</label>
							<select name="driver_id" class="form-control">
								<option value="">Seleccione Conductor</option>
								@foreach($people as $person )
								<option {{ (int) old( 'driver_id')===$person->id ? 'selected' : '' }} value="{{ $person->id }}">{{ $person->full_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-12 col-md-6">
							<label>Anfitrión</label>
							<select name="host_id" class="form-control">
								<option value="">Seleccione Anfitrión</option>
								@foreach($people as $person )
								<option {{ (int) old( 'host_id')===$person->id ? 'selected' : '' }} value="{{ $person->id }}">{{ $person->full_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-12">
							<button type="button" class="btn btn-block btn-sm btn-primary" data-toggle="modal" data-target="#SignUp" id="open">
								<i class="far fa-user"></i> Ingresar datos
							</button>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label>Grado del Incidente</label>
							<select name="level_id" class="form-control">
								<option value="">Seleccione Grado</option>
								@foreach($levels as $id => $level )
								<option {{ (int) old('level_id')===$id ? 'selected' : '' }} value="{{ $id }}">{{ $level }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-12 col-md-6">
							<label>Area</label>
							<select name="area_id" class="form-control">
								<option value="">Seleccione Area</option>
								@foreach($areas as $id => $area)
								<option {{ (int) old('area_id')===$id ? 'selected' : '' }} value="{{ $id }}">{{ $area }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label>Bus</label>
							<select name="bus_id" class="form-control">
								<option value="">Seleccione Bus</option>
								@foreach($buses as $id => $bus )
								<option {{ (int) old('bus_id')===$id ? 'selected' : '' }} value="{{ $id }}">{{ $bus }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-12 col-md-6">
							<label>Patio</label>
							<select name="patio_id" class="form-control">
								<option value="">Seleccione Patio</option>
								@foreach($patios as $id => $patio)
								<option {{ (int) old('patio_id')===$id ? 'selected' : '' }} value="{{ $id }}">{{ $patio }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="">Detalle del Incidente</label>
						<textarea name="applicant_obs" class="form-control">{{ old('applicant_obs') }}</textarea>
					</div>
					<hr>
					<div class="form-group">
						<button class="btn btn-sm btn-success">
							<i class="fas fa-plus-circle"></i> Registrar Ticket</button>
						<a href="{{ route('tickets.index') }}" title="Reenviar ticket" class="btn  btn-sm btn-primary">
							<i class="fas fa-arrow-left"></i> Cancelar</a>
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->

<div class="modal fade" id="SignUp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="alert alert-danger" style="display:none"></div>
			<div class="modal-header">
				<h5 class="modal-title">Registrar Persona</h5>	
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="{{ url('people/store') }}" method="POST" id="Register">
					{{csrf_field()}}
					<div id="success-msg" class="hide">
						<div class="alert alert-info alert-dismissible fade in" role="alert">
							<strong>Success!</strong> 
						</div>
					</div>
					<div class="form-group">
						<label for="">Primer Apellido</label>
						<input type="text" name="firstName" class="form-control" id="firstName">
						<span class="text-danger">
							<strong id="firstName-error"></strong>
						</span>
					</div>
					<div class="form-group">
						<label for="">Segundo Apellido</label>
						<input type="text" name="lastName" class="form-control" id="lastName">
						<span class="text-danger">
							<strong id="lastName-error"></strong>
						</span>
					</div>
					<div class="form-group">
						<label for="">Nombres</label>
						<input type="text" name="name" class="form-control" id="name">
						<span class="text-danger">
							<strong id="name-error"></strong>
						</span>
					</div>
					<div class="form-group">
							<label for="">Cedula de identidad</label>
							<input type="text" name="identity_card" class="form-control" id="identity_card">
							<span class="text-danger">
                                <strong id="identity_card-error"></strong>
                            </span>
					</div>
 					<div class="form-group">
							<label for="">Expedido</label>
							<input type="text" name="issued" class="form-control" id="issued">
							<span class="text-danger">
                                <strong id="issued-error"></strong>
                            </span>
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-primary" id="submitForm">Guardar</button>
					</div> 
				</form>
			</div>
		</div>
	</div>
</div>

@endsection 

@push('scripts')
<script type="text/javascript">

$(document).on('click', '#submitForm', function(){
	var registerForm = $("#Register");
	var formData = registerForm.serialize();
	$( '#firstName-error' ).html( "" );
	$( '#lastName-error' ).html( "" );
	$( '#name-error' ).html( "" );
	$( '#identity_card-error' ).html( "" );
	$( '#issued-error' ).html( "" );
	
	$.ajax({
		url:'/people/store',
		type:'POST',
		data:formData,
		success:function(data) {
			console.log(data);
			if(data.errors) {
				if(data.errors.firstName){
					$( '#firstName-error' ).html( data.errors.firstName[0] );
				}
				if(data.errors.lastName){
					$( '#lastName-error' ).html( data.errors.lastName[0] );
				}
				if(data.errors.name){
					$( '#name-error' ).html( data.errors.name[0] );
				}
				if(data.errors.identity_card){
					$( '#identity_card-error' ).html( data.errors.identity_card[0] );
				}
				if(data.errors.issued){
					$( '#issued-error' ).html( data.errors.issued[0] );
				}
				
			}
			if(data.success) {
				$('#success-msg').removeClass('hide');
				setInterval(function(){ 
					$('#SignUp').modal('hide');
					$('#success-msg').addClass('hide');
				}, 3000);
			}
		},
	});
});

 </script>
@endpush

