@extends('layouts.app')
@section('content')
	<div class="pl-5 pr-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h2>Actualiza tus datos</h2>
					</div>

					@if (session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif
					@if (session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif

					<div class="card-body">
				 		<form method="POST" action="{{ route('profile.update') }}" novalidate>
							@csrf
							@method('PUT')
							
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">{{__("Nombre de usuario") }}</label>
								<div class="col-md-6">
									<input type="text" readonly class="form-control" value="{{ old('name') ?: $user->name }}" required autofocus>
								</div>
							</div>
							<div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    {{ __("Correo electrónico") }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        readonly
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        value="{{ old('email') ?: $user->email }}"
                                        required
                                        autofocus
                                    />
                                </div>
							</div>
							<div class="form-group row {{ $errors->has('current-password') ? ' has-error' : '' }}">
									<label for="current-password" class="col-md-4 col-form-label text-md-right">{{__("Contraseña actual") }}</label>
									<div class="col-md-6">	
										<input type="password" class="form-control" name="current-password" required>
										@if ($errors->has('current-password'))
                                    		<span class="help-block">
                                       	 		<strong>{{ $errors->first('current-password') }}</strong>
                                   			</span>
                              			@endif
									</div>
							</div>
							<div class="form-group row {{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label
                                    for="new-password"
                                    class="col-md-4 col-form-label text-md-right"
                                >
                                    {{ __("Contraseña nueva") }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="new-password"
                                        type="password"
                                        class="form-control"
                                        name="new-password"
                                        required
									/>
									@if ($errors->has('new-password'))
                                    	<span class="help-block">
                                        	<strong>{{ $errors->first('new-password') }}</strong>
                                    	</span>
                                	@endif
							   </div>
							</div>
							<div class="form-group row">
                                <label
                                    for="new-password-confirm"
                                    class="col-md-4 col-form-label text-md-right"
                                >
                                    {{ __("Confirma la contraseña") }}
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="new-password_confirmation"
                                        type="password"
                                        class="form-control"
                                        name="new-password_confirmation"
                                        required
                                    />
                                </div>
							</div>
							<div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Actualizar datos") }}
                                    </button>
                                </div>
                            </div>
						</form> 
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection