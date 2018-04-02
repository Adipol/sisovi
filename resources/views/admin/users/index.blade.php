@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 ">
			<div class="card">
				<div class="card-header">
					<h2>Usuarios</h2>
				</div>
				<div class="card-body">
					<a href="{{ route('users.create')}}" class="btn btn-primary" style="margin-botton: 15px;"><i class="fas fa-user-plus"> </i> Crear Usuario</a>

					<div class="alert-custom">
						@if (session('notification'))
							<div class="alert alert-success">
								{{ session('notification')}}
							</div>
						@endif
				
						@if (count($errors)>0)
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
					</div>
						<div class="table-responsive">  
						<table class="table table-bordered table-hover">
								<thead class="thead-light">
									<tr>
									<th style="padding-left:15px;">#</th>
									<th>Nombre</th>
									<th>Email</th>
									<th>Rol</th>
									<th width="110px">Opciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $key=>$user)
										<tr>
											<td style="padding-left:15px;">{{ $key+1 }}</td>
											<td>{{ $user->name}}</td>
											<td>{{ $user->email}}</td>
											<td>{{ $user->rol_id}}</td>
											<td>
												<a href="" title="Editar" class="btn  btn-sm btn-success"><i class="fas fa-edit"></i></a>
													
												<a href="" title="Dar de baja" class="btn btn-sm btn-danger">
													<i class="fas fa-trash-alt"></i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
			</div>
		
		</div>
	</div>
</div>
@endsection()


