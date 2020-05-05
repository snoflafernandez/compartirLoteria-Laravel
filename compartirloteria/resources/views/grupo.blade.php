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
		    <p class="card-text">{{$usuario->DNI}}</p>
		    <p class="card-text">{{$usuario->email}}</p>
		    <p class="card-text">{{$usuario->fecha_nacimiento}}</p>
		  </div>
		</div>
	</div>
	@else
	<div class="col mt-3">
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">{{$usuario->nombre}} {{$usuario->apellidos}}</h5>
		    <p class="card-text">{{$usuario->DNI}}</p>
		    <p class="card-text">{{$usuario->email}}</p>
		    <p class="card-text">{{$usuario->fecha_nacimiento}}</p>
		  </div>
		</div>
	</div>
	@endif
	@endforeach
	@if ( auth()->user()->num_users > $cuentas->count() )
	<div class="col mt-3">
		<a href="{{url('/user')}}" role="button"><button type="button" class="btn btn-warning">Añadir usuario</button></a>
	</div>
	@else
	<div class="col mt-3">
		<a href="{{route('imprimir')}}" role="button"><button type="button" class="btn btn-danger">Generar PDF</button></a>
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
		    <p class="card-text">{{$boleto->numero}}</p>
		    <p class="card-text">{{$boleto->numero_sorteo}}</p>
		    <p class="card-text">{{$boleto->serie}}</p>
		    <p class="card-text">{{$boleto->fraccion}}</p>
		    <p class="card-text">{{$boleto->precio}}</p>
		    <p class="card-text">{{$boleto->fecha_sorteo}}</p>
		    <p class="card-text">{{$boleto->participacion_user}}</p>
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