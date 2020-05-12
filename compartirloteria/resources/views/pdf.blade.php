<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<title>CompartirLoteria.com</title>
</head>
<body>
	<h1>Contrato compartir loteria</h1><br><br>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
	<!--Probar a dar aspecto de tabla-->
	<h4>Nombre del grupo: {{ auth()->user()->nombre }}</h4><br>
	<table style="border-collapse: separate; border-spacing: 15px;">
		<tr>
		@foreach( $data as $key)
			<td style="width: 100px;">
				<h6>{{$key->nombre}} {{$key->apellidos}}</h6>
				<p>{{$key->DNI}}</p>
				<p>{{$key->fecha_nacimiento}}</p>
				<p>{{$key->email}}</p>
			</td>
		@endforeach
		</tr>
		<tr>
		@foreach( $data as $key)
			<td style="border:1px solid black; height: 100px; width: 100px;">
				&nbsp;&nbsp;&nbsp;
			</td>
		@endforeach
		</tr>
	</table>
</body>
</html>