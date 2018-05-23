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
							<button type="button" class="btn btn-block btn-sm btn-primary" data-toggle="modal" data-target="#myModal" id="open">
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
<form method="post" action="{{url('people/store')}}" id="form">
	{{csrf_field()}}
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-header">
				<h5 class="modal-title">Registrar Persona</h5>	
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="alert alert-danger" style="display:none"></div>
					<div class="form-group">
						<label for="">Primer Apellido</label>
						<input type="text" name="firstName" class="form-control" id="firstName">
					</div>
					<div class="form-group">
						<label for="">Segundo Apellido</label>
						<input type="text" name="lastName" class="form-control" id="lastName">
					</div>
					<div class="form-group">
						<label for="">Nombres</label>
						<input type="text" name="name" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="">Cedula de identidad</label>
						<input type="text" name="identity_card" class="form-control" id="identity_card">
					</div>
 					<div class="form-group">
						<label for="">Expedido</label>
						<input type="text" name="issued" class="form-control" id="issued">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary" id="ajaxSubmit">Guardar</button>
					</div> 
			</div>
		</div>
	</div>
</div>
</form>

@endsection 

@push('scripts')
      <script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                  headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/people/store') }}",
                  method: 'post',
                  data: {
					firstName    : jQuery('#firstName').val(),
					lastName     : jQuery('#lastName').val(),
					name         : jQuery('#name').val(),
					identity_card: jQuery('#identity_card').val(),
					issued       : jQuery('#issued').val(),
                  },
                  success: function(result){
                  	if(result.errors)
                  	{
                  		jQuery('.alert-danger').html('');

                  		jQuery.each(result.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  	}
                  	else
                  	{ 
                  		jQuery('.alert-danger').hide();
                  		//$('#open').hide();
                  		$('#myModal').modal('hide');
                  	}
                  }});
               });
            });
      </script>
@endpush

