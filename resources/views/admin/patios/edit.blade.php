@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header">
					<h5>Modificar Patio</h5> 
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
					 {!! Form::model($patio,['route'=>['patios.update',$patio->id],'method'=>'POST'])!!}
					 
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" name="name" class="form-control" value="{{$patio->name }}" >
						</div>

						<div class="form-group">
								<label for="">Abreviación</label>
								<input type="text" name="abreviation" class="form-control" value="{{ $patio->abreviation }}">
						</div>
						
						
						<div class="form-group">
								<button  class="btn btn-primary"><i class="fas fa-plus-circle"></i> Guardar cambios</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection()
