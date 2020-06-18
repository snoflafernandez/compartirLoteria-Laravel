@extends('layouts.master')
@section('content')

<div class="col-12 mt-4">
	<h2>{{ auth()->user()->nombre }}</h2>
</div>

<object>
	@if (file_exists(public_path('almacenamiento/')."contrato-".auth()->user()->nombre.".pdf"))
		<embed src="{{ asset('almacenamiento/contrato-'.auth()->user()->nombre.'.pdf') }}" width="100%" height="800" allowfullscreen="true" type="application/pdf"></embed>
	@else
		<embed src="{{route('imprimir')}}" width="100%" height="800" allowfullscreen="true" type="application/pdf"></embed>
	@endif
</object>
@endsection