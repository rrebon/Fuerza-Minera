@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h1>Información</small></h1>
			</div>
		</div>
		<br>
		<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@forelse($infos as $info)
			<div class="container bordeTrab">
				<div class="row">
					<h2>{{ $info->titulo }}</h2>
					<small>{{ $info->texto }}</small>
					<a href="{{ url('informacion/getDownload/'.$info->idInfo) }}"><button class="btn btn-lg">Descargar</button></a>
				</div>
			</div>
		@empty 
			<h3>No hay información para mostrar.</h3>
		@endforelse
		</div>		
		<div class="container col-xs-6 col-sm-12 col-md-12 col-lg-12">
			<nav>
				<ul class="pager">
					<li class="disabled previous"><a href="{{ $infos->previousPageUrl() }}">Anterior</a></li>
					<li><a href="{{ $infos->nextPageUrl() }}" class="next" style="color:#F0D431;">Siguiente</a></li>
				</ul>
			</nav>
		</div>
	</div>	
@endsection