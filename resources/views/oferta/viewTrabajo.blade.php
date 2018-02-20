@extends('layouts.app')

@section('content')	
	<!--PUBLICACION-->
	<div class="container">
		<h1>{{ $trabajo->titulo }}<small>{{ $trabajo->fechaCreacion }}</small></h1>
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
				<h5> {{ $trabajo->texto }}</h5>
			</div>
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
				<h2>{{ $trabajo->usuarioCreacion->name }}</h2>
				<a href="{{url('ofertaLaboral/getDownload/'.$trabajo->idOferta)}}">
					
						<input class="form-control boton" type="submit" value="Descargar" name="descargar" id="descargar">
										
				</a>
			</div>
		</div>
	</div>
	<br>
@endsection
