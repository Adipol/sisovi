@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header">
					<h5>Crear Nuevo Bus</h5> 
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
					{!! Form::open(['route'=>'buses.store']) !!}
					
						<div class="form-group">
							<label for="">Código</label>
							<input type="text" name="code" class="form-control" value="{{ old('code') }}" >
						</div>
						<div class="form-group">
								<label for="">Placa</label>
								<input type="text" name="license_plate" class="form-control" value="{{ old('license_plate') }}">
						</div>
						<div class="form-group">
								<label>Patio</label>

								<select name="patio_id" class="form-control">
								  <option value="">Seleccione patio</option>
								  @foreach($patios as $patio)

									<option value="{{ $patio->id }}">{{ $patio->name}}</option>
								  
									@endforeach
								</select>
						</div>
						<div class="form-group">
								<button  class="btn btn-primary"><i class="fas fa-plus-circle"></i> Registrar Bus</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection()
