@extends('layouts.app')

@section('content')	
	<?php 
		//muestro los campos para editar o eliminar si es el administrador o es el usuario creador
		$user = Auth::user();
		if(Auth::check() && ($user->hasRole(['administrador']) || $user->id===$trabajo->idUsuarioCreacion)):
	?>
	<!-- Botnes de Editar y Eliminar -->	
	<div class="container">
		<div class="row">
			<div class="form-group">
				<form action="{{ url('ofertaLaboral/'.$trabajo->idOferta.'/edit') }}" method="get" class="form-row">
				<button type="submit" class="btn btn-info">
  					Modificar
				</button>						
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#deleteConfirmacion">
  					Eliminar
				</button>							
				</form>				
			</div>			
		</div>
	</div>
	
	<!-- Modal de confirmar eliminacion -->
	<div class="modal" id="deleteConfirmacion" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title">Confirmación de la oferta laboral</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<p><?php echo "¿Desea Eliminar la oferta laboral con titulo: ". $trabajo->titulo ."?" ?></p>
					</br>
				</div>
				<div class="modal-footer">
					<form action="{{ url('ofertaLaboral/'.$trabajo->idOferta.'/deletepost') }}" method="post">	
						{!! csrf_field() !!}			
						<button type="submit" class="btn btn-danger">Eliminar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					</form>				
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
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



