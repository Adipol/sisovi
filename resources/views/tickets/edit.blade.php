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
					{!! Form::model($ticket,['route'=>['tickets.update',$ticket->idt],'method'=>'POST','files'=>true,'id'=>'uploadForm'])!!}

			

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
							<textarea name="operational_obs" class="form-control">{{ old('operational_obs') }}</textarea>
						</div>

						<div class="form-group">
							 <label for="">Subir archivo</label>
							 
							<input type="file" name="uploadFile" id="uploadFile">
							<hr>

							<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
									</div>
								</div>
							<div id="targetLayer"></div>
							<hr>
						</div>

						<div class="form-group">
								<input type="submit" id="uploadSubmit" value="Cargar" class="btn btn-primary">
								<button class="btn btn-default" type="reset">Reset</button>
						</div>
						
					{!! Form::close() !!}
					<div id="loader-icon" style="display:none"><img src="/images/LoaderIcon.gif">  </div>
				</div>
			</div>
		</div>
	</div>
</div>


@section('scripts')
<script>

   $(document).ready(function(){
	   $('#uploadForm').submit(function(e){
		   if($('#uploadFile').val()){
			   e.preventDefault()
			   $('#loader-icon').show()
			   $(this).ajaxSubmit({
				   target: "#targetLayer",
				   beforeSubmit:function(){
					   $('.progress-bar').width('0%')
				   },
				   uploadProgress: function(event, position, total, percentComplete){
					   $(".progress-bar").width(percentComplete+'%')
					   $(".progress-bar").html('<div id="progress-status">'+percentComplete+' %</div>')
				   },
				   success:function(){
					   $('#loader-icon').hide()
				   },
				   resetForm:true
			   })
			   return false
		   }
	   })
   })

</script>
@endsection

@endsection
