@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 ">
			<div class="card">
				<div class="card-header">
					<h2>Buses</h2>
				</div>
				<div class="card-body">
					<a href="" class="btn btn-primary" style="margin-botton: 15px;"><i class="fas fa-user-plus"> </i> Crear Usuario</a>
					<hr>
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
						<table class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
									<tr>
									<th style="padding-left:15px;">#</th>
									<th><i class="fas fa-user-circle"></i> Código</th>
									<th><i class="fas fa-envelope"></i> Placa</th>
									<th> Patio</th>
									<th width="130px">Opciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($buses as $key=>$bus)
										<tr>
											<td style="padding-left:15px;">{{ $key+1 }}</td>
											<td>{{ $bus->code }}</td>
											<td>{{ $bus->license_plate }}</td>
											<td>{{ $bus->patio->name }}</td>
											<td>
											 @if($bus->trashed())
										    	 <a href="" class="btn btn-sm btn-info" title="Restaurar">
												 <i class="fas fa-undo"></i></a>
											@else	
											    <a href="" title="Editar" class="btn  btn-sm btn-success"><i class="fas fa-edit"></i></a>	
												<a href="" title="Dar de baja" class="btn btn-sm btn-danger">
													<i class="fas fa-trash-alt"></i>
												</a>
											@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<div>	 {{ $buses->render()}}</div>
							
						</div>
					</div>
			</div>
		
		</div>
	</div>
</div>
@endsection()


