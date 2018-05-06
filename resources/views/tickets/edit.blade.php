@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header">
					<h5>Ticket</h5> 
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

				<div class="card-body" >
			    {!! Form::model($ticket,['route'=>['tickets.update',$ticket->id],'method'=>'POST','files'=>true])!!}
				  <input type="hidden" name="applicant_id" value="{{$ticket->applicant_id}}">
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="">Codigo de Ticket</label>
							<input type="text" name="cod_name" class="form-control"  value="{{ $ticket->code_area }}" readonly >
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="">Solicitante</label>
							<input type="text" name="applicant" class="form-control"  value="{{ $ticket->user->name}}" readonly >
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="">Area</label>
							<input type="text" name="area_id" class="form-control"  value="{{ $ticket->area->name}}" readonly >
					    </div> 
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label>Bus</label>
							<input type="text" name="bus_id" class="form-control"  value="{{ $ticket->bus->code }}" readonly >
						</div>
						<div class="form-group col-12 col-md-6">
							<label>Patio</label>
							<input type="text" name="patio_id" class="form-control"  value="{{ $ticket->bus->patio->name }}" readonly >
						</div>
					</div>

					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label>Grado del Incidente</label>
							<input type="text" name="lname" class="form-control"  value="{{ $ticket->level->name }}" readonly >
						</div>
						<div class="form-group col12 col-md-6">
							<label for="">Fecha del Incidente</label>
							<input  type="date" name="incident_date" class="form-control" value="{{$ticket->incident_date->format('Y-m-d') }}" readonly>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="">Conductor</label>
							<input type="text" name="driver" class="form-control"  value="{{ $ticket->driver }}" readonly >
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="">Anfitrión</label>
							<input type="text" name="host" class="form-control"  value="{{ $ticket->host }}" readonly >
						</div>
					</div>

						<div class="form-group">
							<label for="">Detalle del Incidente</label>
							<textarea name="applicant_obs" class="form-control" readonly>{{ $ticket->applicant_obs }}</textarea>
						</div>

						<div class="form-group">
							<label for="">Observaciones</label>
							<textarea name="operational_obs" class="form-control" id="operational_obs">{{ old('operational_obs') }}</textarea>
						</div>

						<div class="form-group">
							 <label for="">Subir archivo</label>
							<input type="file" name="file" id="media"  class="form-control">
							<hr>
							<div class="progress">
								<div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
								  0%
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<button class="btn btn-sm btn-success" type="submit"><i class="fas fa-plus-circle"></i> Cargar</button>
							<a href="{{ route('tickets.index') }}" title="Reenviar ticket" class="btn  btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Cancelar</a>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>


@section('scripts')
{{-- <script>
/* $(document).ready(function() {

$('#form').on('submit', function(event) {

	event.preventDefault();

	var formData = new FormData($('#form')[0]);
	
    var  MyItem_id= $('#ticket_id').val();;

	var token = $('input[name=_token]').val();

	$.ajax({
		xhr : function() {
			var xhr = new window.XMLHttpRequest();

			xhr.upload.addEventListener('progress', function(e) {

				if (e.lengthComputable) {

					console.log('Bytes Loaded: ' + e.loaded);
					console.log('Total Size: ' + e.total);
					console.log('Percentage Uploaded: ' + (e.loaded / e.total))

					var percent = Math.round((e.loaded / e.total) * 100);

					$('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
				}

			},false);

			return xhr;
		},
	
		type : 'POST',
		url: '/tickets/'+MyItem_id+'/upload', 
		headers: {'X-CSRF-TOKEN':token}, 
		data : formData,
		//dataType : 'json', 
		processData : false,
		contentType : false,
		success: function (data) { 
			alert('Record updated successfully');
			 },

	});

});

}); */
</script> --}}
@endsection

@endsection
