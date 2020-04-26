@extends('layouts.master')
@section('content')
<div class="row">
	<div class="mt-4 d-sm-block d-md-block col-md-6 col-lg-6">
		<div class="card">
		    <div class="card-header"><h5>{{ __('Iniciar sesión') }}</h5>

		    </div>
		    <div class="card-body">
		        <form class="form" role="form" method="POST" action="{{ route('login') }}">
		        	@csrf
		            <div class="form-group row">
		                <label class="col-lg-3 col-form-label form-control-label">{{ __('Nombre del grupo') }}</label>
		                <div class="col-lg-9">
		                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" autofocus>
		                    @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="form-group row">
		                <label for="password" class="col-lg-3 col-form-label form-control-label">{{ __('Password') }}</label>
		                <div class="col-lg-9">
		                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
		                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="form-group row">
		                <label class="col-lg-3 col-form-label form-control-label"></label>
		                <div class="col-lg-9">
		                    <input type="submit" class="btn btn-primary" value="Iniciar sesión">
		                </div>
		            </div>
		        </form>
		    </div>
		</div>
		<button type="button" class="btn btn-link">¿Olvidó la contraseña?</button>


		<a href="#nuevaCuenta" role="button" data-toggle="modal" data-target="#nuevaCuenta"><button type="button" class="btn btn-link">Crear una cuenta</button></a>

<!--Formulario pop-up NUEVA-CUENTA (class="modal fade")-->
		<div id="nuevaCuenta" class="modal fade">
		<div class="modal-dialog">
		    <div class="modal-content">
		        <div class="modal-header bg-primary">
		            <h4 class="modal-title text-white">Nuevo grupo</h4>
		        </div>
		        <div class="modal-body">
					<form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('num_users') ? ' has-error' : '' }}">
                            <label for="num_users" class="col-md-4 control-label">Numero de usuarios</label>

                            <div class="col-md-6">
                                <input id="num_users" type="number" class="form-control" name="num_users" value="{{ old('num_users') }}" required>

                                @if ($errors->has('num_users'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('num_users') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
		        </div>
		    </div>
		</div>
		</div>
	</div>


	<div class="mt-4 d-none d-md-block col-md-6 col-lg-6">
		<img src="https://img.vixdata.io/pd/webp-large/es/sites/default/files/imj/otramedicina/P/Propiedades-saludables-del-trebol-1.jpg" class="img-fluid" alt="Responsive image">
	</div>
</div>
@endsection