@forelse($trabajos as $trabajo)
<div class="container bordeTrab">
	<div class="row">
		<a href="{{ url('ofertaLaboral/'.$trabajo->idOferta) }}"><h2>{{
				$trabajo->titulo }}</h2></a> <small>{{ $trabajo->intro }}</small>
		<h4 class="text-right">{{ $trabajo->usuarioCreacion->name }}</h4>
	</div>
</div>
@empty
	 <h3>No se encontraron ofertas.</h3>
@endforelse

<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
	<nav>
		<ul class="pager">
			<li class="previous"><a href="{{ $trabajos->previousPageUrl() }}">Anterior</a></li>
			<li><a href="{{ $trabajos->nextPageUrl() }}" class="next"
				style="color: #F0D431;">Siguiente</a></li>
		</ul>
	</nav>
</div>
