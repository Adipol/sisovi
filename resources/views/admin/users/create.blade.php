@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-header">
					<h5>Crear Nuevo Usuario</h5> 
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
					{!! Form::open(['route'=>'users.store']) !!}
					
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" >
						</div>
						<div class="form-group">
								<label for="">Correo Electronico</label>
								<input type="mail" name="email" class="form-control" value="{{ old('email') }}">
						</div>
						<div class="form-group">
								<label for="">Contraseña</label>
								<input type="text" name="password" class="form-control" value={{ old('password') }} >
						</div>
						<div class="form-group">
								<label>Rol</label>

								<select name="rol_id" class="form-control">
								  <option value="">Seleccione rol</option>
								  @foreach($roles as $rol)

									<option value="{{ $rol->id }}">{{ $rol->name}}</option>
								  
									@endforeach
								</select>
						</div>
						<div class="form-group">
								<button  class="btn btn-primary"><i class="fas fa-plus-circle"></i> Registrar Usuario</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection()
