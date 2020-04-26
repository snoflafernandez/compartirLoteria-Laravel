@extends('layouts.master')
@section('content')
<div class="row mt-4">
	<div class="d-sm-block d-md-block col-md-6 col-lg-6">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
	<div class="col-12">
		<a href="https://www.sede.fnmt.gob.es/certificados" style="text-decoration:none"><button type="button" class="btn btn-primary btn-lg btn-block">Obtener certificado digital</button></a>
	</div>
</div>
@endsection