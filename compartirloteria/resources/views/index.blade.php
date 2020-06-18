@extends('layouts.master')
@section('content')
<div class="row mt-4">
	<div class="d-sm-block d-md-block col-md-6 col-lg-6">
		<p style="text-align: justify;">
			Compartir lotería puede ser un auténtico quebradero de cabeza, ¿Quién guarda el billete? ¿Cómo nos aseguramos de que si toca un premio lo podamos compartir sin ningún problema? ¿Qué pasa si la persona que tiene el billete en su poder no quiere compartirlo?<br>
			Bien, todas esas preguntas obtienen respuesta en esta plataforma ya que en ella podrá crear contratos válidos para compartir lotería con las máximas garantías de manera que todo quede reflejado por escrito, desde la fecha del sorteo hasta la participación por persona. <br>
			<strong>Y todo de una manera muy sencilla e intuitiva</strong>.
		</p>
	</div>
	<div class="d-none d-md-block col-md-6 col-lg-6">
		<img src="https://www.eoi.es/blogs/alfredo-fernandez-lorenzo/files/2017/11/Loter%C3%ADa-2.jpg" class="img-fluid" alt="Responsive image">
	</div>
	<div class="col-12 mt-2">
		<a href="{{url('/login')}}" style="text-decoration:none"><button type="button" class="btn btn-warning btn-lg btn-block">Quiero compartir lotería</button></a>
	</div>
</div>


<div class="row mt-4">
	<div class="d-none d-md-block col-md-6 col-lg-6">
		<img src="https://thumbs.dreamstime.com/b/documento-con-el-icono-plano-del-esquema-candado-123522990.jpg" class="img-fluid" alt="Responsive image">
	</div>
	<div class="d-sm-block d-md-block col-md-6 col-lg-6">
		<p style="text-align: justify;">
			Ahora que ha decidido utilizar <strong>CompartirLoteria.com</strong> necesita un certificado digital de persona física, para obtenerlo debe seguir los pasos explicados en el enlace inferior pertenencientes a la FNMT. <br>
			Si ya contaba con un certificado instalado en su dispositivo puede continuar con el botón superior
		</p>
	</div>
	<div class="col-12">
		<a href="https://www.sede.fnmt.gob.es/certificados" style="text-decoration:none"><button type="button" class="btn btn-primary btn-lg btn-block">Obtener certificado digital</button></a>
	</div>
</div>
@endsection