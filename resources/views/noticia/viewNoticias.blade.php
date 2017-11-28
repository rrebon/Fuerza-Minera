@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Noticias</h1>
			</div>
			
			@forelse($noticias as $noticia)
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 thumbnail">
					<img src="img/somos1.jpg" alt="">
					<div class="caption">
						<h3>{{ $noticia->titulo }} <small> {{ $noticia->fechaAlta }} </small></h3>
						<h4 class="hidden-xs">{{ $noticia->intro }}</h4>
						<a href="articulo.html" style="text-decoration:none">Leer más</a>
					</div>
				</div>
			@empty
				<h3>No hay noticias para mostrar.</h3>
			@endforelse

			<div class="container col-xs-6 col-sm-12 col-md-12 col-lg-12">
				<nav>
					<ul class="pager">
						<li class="disabled previous"><a href="{{ $noticias->previousPageUrl() }}">Anterior</a></li>
						<li><a href="{{ $noticias->nextPageUrl() }}" class="next" style="color:#F0D431;">Siguiente</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
@endsection