@extends('layouts.app')
@section('content')

	<!-- Botnes de Editar y Eliminar -->	
	<div class="container">
		<div class="row">
			<div class="form-group">
				<form action="{{ url('noticia/'.$noticia->idNoticia.'/edit') }}" method="get" class="form-row">
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

	<!--ARTICULO-->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1>{{ $noticia->titulo }} <small>{{ $noticia->fechaAlta }}</small></h1>
				<div class="container">
					<div class="row">{!! $noticia->texto !!}</div>					
				</div>
			</div>
		</div>
		<div class="row"><br><hr><br></div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 thumbnail">
				<a href="{{ url(Storage::url($noticia->urlImagenIntro)) }}" data-lightbox="imagen">
					<img src="{{ url(Storage::url($noticia->urlImagenIntro)) }}" alt="">
				</a>
			</div>
		</div>	
	</div>
	<br>
	
	<div class="modal" id="deleteConfirmacion" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title">Confirmación de la Noticia laboral</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<p><?php echo "¿Desea Eliminar la Noticia con titulo: ". $noticia->titulo ."?" ?></p>
					</br>
				</div>
				<div class="modal-footer">
					<form action="{{ url('noticia/'.$noticia->idNoticia.'/deletepost') }}" method="post">	
						{!! csrf_field() !!}			
						<button type="submit" class="btn btn-danger">Eliminar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					</form>				
				</div>
			</div>
		</div>
	</div>
	
@endsection
