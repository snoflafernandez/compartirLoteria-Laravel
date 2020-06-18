<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<title>CompartirLoteria.com</title>
</head>
<body>
	<!--<p align="right" style="color: #cccccc;">CompartirLoteria.com</p>-->

	<p style="margin-top: 0px;font-size: 20px;">Contrato compartir lotería</p><br><br>
	<p>A través del siguiente contrato los usuarios pertenecientes al grupo <strong>{{ auth()->user()->nombre }}</strong> abajo mencionados se comprometen a compartir el boleto de lotería cuyos datos abajo descritos hacen referencia al boleto en cuestión.<br>
	Este archivo PDF se encuentra firmado digitalmente de manera que se verifica su <strong>fecha y hora de creación</strong> de manera que abriéndolo con un visor (Adobe Reader por ejemplo) podremos ver por quien esta firmado.</p><br>
	<!--Probar a dar aspecto de tabla-->
	<table style="border-collapse: separate; border-spacing: 15px;">
		<tr>
			<td style="width: 80px; text-align: right;">
				<p><strong>Nombre</strong>: </p>
				<p><strong>DNI</strong>: </p>
				<p><strong>Fecha de nacimiento</strong>: </p>
				<p><strong>E-Mail</strong>: </p>
			</td>
		@foreach( $data as $key)
			<td style="width: 100px;">
				<p>{{$key->nombre}} {{$key->apellidos}}</p>
				<p>{{$key->DNI}}</p>
				<p>{{$key->fecha_nacimiento}}</p>
				<p>{{$key->email}}</p>
			</td>
		@endforeach
		</tr>
	</table>
	<p style="font-size: 15px">Información del boleto</p>
	@foreach( $boletos as $key)
		<p><strong>Número</strong>: {{$key->numero}}</p>
		<p><strong>Número de sorteo</strong>: {{$key->numero_sorteo}}</p>
		<p><strong>Serie</strong>: {{$key->serie}}</p>
		<p><strong>Fracción</strong>: {{$key->fraccion}}</p>
		<p><strong>Precio</strong>: {{$key->precio}}€</p>
		<p><strong>Fecha del sorteo</strong>: {{$key->fecha_sorteo}}</p>
		<p><strong>Participación por usuario</strong>: {{$key->participacion_user}}€</p>
	@endforeach	
	@if (file_exists(public_path("images/").auth()->user()->idgroups."/tmp/"))
	<table><tr>
		<td><img src="{{ asset('images/'.auth()->user()->idgroups.'/'.$key->foto_delante) }}" width="250"></td>
	</tr></table><br>
	<table><tr>
		<td><img src="{{ asset('images/'.auth()->user()->idgroups.'/'.$key->foto_detras) }}" width="250"></td>
	</tr></table>
	@endif

</body>
</html>