@extends('layouts.master')
@section('content')

<div class="col-12 mt-4">
	<h2>{{ auth()->user()->nombre }}</h2>
</div>

<object>
	<embed src="{{route('imprimir')}}" width="100%" height="800" allowfullscreen="true" type="application/pdf"></embed>
</object>

<!--<iframe src="{{route('imprimir')}}" width="100%" height="800" allowfullscreen="true" type="application/pdf">
	
</iframe>-->


@endsection