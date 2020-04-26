@extends('layouts.master')
@section('content')
<div id="nuevoUser">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header bg-primary">
	            <h4 class="modal-title text-white">Añadir usuario</h4>
	        </div>
	        <div class="modal-body">

	        	<!--Esta comentado porque la routa no es la mencionada todavia-->
				<form class="form-horizontal" method="POST" action="#">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                        <label for="dni" class="col-md-4 control-label">DNI</label>

                        <div class="col-md-6">
                            <input id="dni" type="number" class="form-control" name="dni" value="{{ old('dni') }}" required>

                            @if ($errors->has('dni'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-md-4 control-label">Nombre</label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>

                            @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                        <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

                        <div class="col-md-6">
                            <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" required>

                            @if ($errors->has('apellidos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('apellidos') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                        <label for="fecha_nacimiento" class="col control-label">Fecha de nacimiento</label>

                        <div class="col-md-6">
                            <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>

                            @if ($errors->has('fecha_nacimiento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" name="groups_idgroups" id="groups_idgroups" value="{{ auth()->user()->idgroups }}">

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Añadir
                            </button>
                        </div>
                    </div>
                </form>
	        </div>
	    </div>
	</div>
</div>
@endsection