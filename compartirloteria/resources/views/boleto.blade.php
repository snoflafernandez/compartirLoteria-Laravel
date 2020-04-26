@extends('layouts.master')
@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-white">Añadir boleto</h4>
        </div>
        <div class="modal-body">

        	<form class="form-horizontal" method="POST" action="#">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                    <label for="numero" class="col control-label">Número</label>

                    <div class="col-md-6">
                        <input id="numero" type="number" class="form-control" name="numero" value="{{ old('numero') }}" required>

                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong>{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('numero_sorteo') ? ' has-error' : '' }}">
                    <label for="numero_sorteo" class="col control-label">Número de sorteo</label>

                    <div class="col-md-6">
                        <input id="numero_sorteo" type="number" class="form-control" name="numero_sorteo" value="{{ old('numero_sorteo') }}" required>

                        @if ($errors->has('numero_sorteo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('numero_sorteo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('serie') ? ' has-error' : '' }}">
                    <label for="serie" class="col control-label">Serie</label>

                    <div class="col-md-6">
                        <input id="serie" type="number" class="form-control" name="serie" value="{{ old('serie') }}" required>

                        @if ($errors->has('serie'))
                            <span class="help-block">
                                <strong>{{ $errors->first('serie') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('fraccion') ? ' has-error' : '' }}">
                    <label for="fraccion" class="col control-label">Fracción</label>

                    <div class="col-md-6">
                        <input id="fraccion" type="number" class="form-control" name="fraccion" value="{{ old('fraccion') }}" required>

                        @if ($errors->has('fraccion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fraccion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                    <label for="precio" class="col control-label">Precio</label>

                    <div class="col-md-6">
                        <input id="precio" type="number" class="form-control" name="precio" value="{{ old('precio') }}" required>

                        @if ($errors->has('precio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('precio') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('fecha_sorteo') ? ' has-error' : '' }}">
                    <label for="fecha_sorteo" class="col control-label">Fecha del sorteo</label>

                    <div class="col-md-6">
                        <input id="fecha_sorteo" type="date" class="form-control" name="fecha_sorteo" value="{{ old('fecha_sorteo') }}" required>

                        @if ($errors->has('fecha_sorteo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha_sorteo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('participacion_user') ? ' has-error' : '' }}">
                    <label for="participacion_user" class="col control-label">Participación por usuario</label>

                    <div class="col-md-6">
                        <input id="participacion_user" type="number" class="form-control" name="participacion_user" value="{{ old('participacion_user') }}" required>

                        @if ($errors->has('participacion_user'))
                            <span class="help-block">
                                <strong>{{ $errors->first('participacion_user') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('foto_delante') ? ' has-error' : '' }}">
                    <label for="foto_delante" class="col control-label">Fotografía del boleto por DELANTE</label>

                    <div class="col-md-10">
                        <input id="foto_delante" type="file" class="form-control" name="foto_delante" value="{{ old('foto_delante') }}">

                        @if ($errors->has('foto_delante'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto_delante') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('foto_detras') ? ' has-error' : '' }}">
                    <label for="foto_detras" class="col control-label">Fotografía del boleto por DETRÁS</label>

                    <div class="col-md-10">
                        <input id="foto_detras" type="file" class="form-control" name="foto_detras" value="{{ old('foto_detras') }}">

                        @if ($errors->has('foto_detras'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto_detras') }}</strong>
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

@endsection