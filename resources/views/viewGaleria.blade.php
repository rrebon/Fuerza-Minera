@extends('layouts.app')

@section('content')

@component('layouts.galeriaImagenes')
	@slot('title')
		{{ $title }}
	@endslot
	@slot('columnas')
		{{ $columnas }}
	@endslot
	@slot('directorio')
		{{ $directorio }}
	@endslot
@endcomponent

@endsection
