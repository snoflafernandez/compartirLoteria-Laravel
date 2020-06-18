@extends('layouts.master')
@section('content')

<div class="col-12 mt-4">
	<h2>{{ auth()->user()->nombre }}</h2>
</div>

<div class="row">
	@foreach( $arrayUsuarios as $key => $usuario)
	@if ( auth()->user()->num_users > $cuentas->count() )
	<div class="col mt-3">
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">{{$usuario->nombre}} {{$usuario->apellidos}}</h5>
		    <p class="card-text"><strong>DNI</strong>: {{$usuario->DNI}}</p>
		    <p class="card-text"><strong>Fecha de nacimiento</strong>: {{$usuario->fecha_nacimiento}}</p>
		    <p class="card-text"><strong>E-Mail</strong>: {{$usuario->email}}</p>
		  </div>
		</div>
	</div>
	@else
	<div class="col mt-3">
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">{{$usuario->nombre}} {{$usuario->apellidos}}</h5>
		    <p class="card-text"><strong>DNI</strong>: {{$usuario->DNI}}</p>
		    <p class="card-text"><strong>Fecha de nacimiento</strong>: {{$usuario->fecha_nacimiento}}</p>
		    <p class="card-text"><strong>E-Mail</strong>: {{$usuario->email}}</p>
		  </div>
		</div>
	</div>
	@endif
	@endforeach
	@if ( auth()->user()->num_users > $cuentas->count() )
	<div class="col mt-3">
		<a href="{{url('/user')}}" role="button"><button type="button" class="btn btn-warning">Añadir usuario</button></a>
	</div><br>
	<!--Prueba AÑADIR INPUT DE CERTIFICADO DIGITAL-->
	<!--<div>
		<form class="form-horizontal" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
			<div class="form-group{{ $errors->has('certificado') ? ' has-error' : '' }}">
                <label for="certificado" class="col control-label">Certificado digital</label>

                <div class="col-md-10">
                    <input id="certificado" type="file" class="form-control" name="certificado" value="{{ old('certificado') }}">

                    @if ($errors->has('certificado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('certificado') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div> 
        </form>
	</div>-->
	@else
	<div class="col mt-3">
		<a href="{{route('muestra')}}" role="button"><button type="button" class="btn btn-danger">Generar PDF</button></a>
	</div>
	@endif
</div>

<div class="row">
	<div class="col-12 mt-4">
		<h3>Boleto</h3>
	</div>
	<div class="col">
		@foreach( $arrayBoletos as $key => $boleto)
		
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Info del boleto</h5>
		    <p class="card-text"><strong>Número</strong>: {{$boleto->numero}}</p>
			<p class="card-text"><strong>Número de sorteo</strong>: {{$boleto->numero_sorteo}}</p>
			<p class="card-text"><strong>Serie</strong>: {{$boleto->serie}}</p>
			<p class="card-text"><strong>Fracción</strong>: {{$boleto->fraccion}}</p>
			<p class="card-text"><strong>Precio</strong>: {{$boleto->precio}}€</p>
			<p class="card-text"><strong>Fecha del sorteo</strong>: {{$boleto->fecha_sorteo}}</p>
			<p class="card-text"><strong>Participación por usuario</strong>: {{$boleto->participacion_user}}€</p>
		  </div>
		</div>
	</div>
	<div class="col">
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    @if (file_exists(public_path("images/").auth()->user()->idgroups."/tmp/"))
				<img src="{{ asset('images/'.auth()->user()->idgroups.'/'.$boleto->foto_delante) }}" width="250"><br><br>
				<img src="{{ asset('images/'.auth()->user()->idgroups.'/'.$boleto->foto_detras) }}" width="250">
			@endif
		  </div>
		</div>
		
		@endforeach
		@if( $arrayBoletos->count() < 1)
		<div class="col mt-3">
			<a href="{{url('/boleto')}}" role="button"><button type="button" class="btn btn-primary">Añadir boleto</button></a>
		</div>
		@else
		@endif
	</div>
	
	
</div>
@endsection