@extends('layouts.app')
@section('content')
	<!--ARTICULO-->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1>{{ $noticia->titulo }} <small>{{ $noticia->fechaAlta }}</small></h1> 
			<h4 class="hidden-xs"> {!! $noticia->texto !!}</h4>

			<h5 class="visible-xs">{!! $noticia->texto !!}</h5>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 thumbnail">
				<a href="{{ $noticia->urlImagenIntro }}" data-lightbox="imagen"><img src="{{ $noticia->urlImagenIntro }}" alt=""></a>
			</div>
		</div>
	</div>
	<br>
@endsection
