@extends('layouts.app')

@section('content')
	<div class="container">
	
		@if(session('message'))
			<div class="alert alert-success">
				<ul>
					<li><?php echo session('message'); ?></li>
				</ul>						
			</div>
		@endif
		
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h1>Información</small></h1>
			</div>
		</div>
		<br>
		<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@forelse($infos as $info)
			<div class="container bordeTrab">
				<!-- Botnes de Editar y Eliminar -->	
				<?php 
					$user = Auth::user();
					if(Auth::check() && $user->hasRole(['administrador'])):
				?>
				<div class="container">
					<div class="row">
						<div class="form-group">
							<form action="{{ url('informacion/'.$info->idInfo.'/edit') }}" method="get" class="form-row">
							<button type="submit" class="btn btn-info">
			  					Modificar
							</button>						
							<button type="button" class="btn btn-info" data-toggle="modal" 
									data-target=<?php echo '"#deleteConfirmacion'.$info->idInfo.'"'?>>
			  					Eliminar
							</button>							
							</form>				
						</div>			
					</div>
				</div>
				
				<!-- Modal de confirmar eliminacion -->
				<div class="modal" id=<?php echo '"deleteConfirmacion'.$info->idInfo.'"'?> tabindex="-1" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title">Confirmación de la oferta laboral</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
								<p><?php echo "¿Desea Eliminar la información con titulo:". $info->titulo ."?" ?></p>
								</br>
							</div>
							<div class="modal-footer">
								<form action="{{ url('informacion/'.$info->idInfo.'/deletepost') }}" method="post">	
									{!! csrf_field() !!}			
									<button type="submit" class="btn btn-danger">Eliminar</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								</form>				
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>
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