@extends('layouts.app')

@section('content')
		
		<script type="text/javascript">
			function buscar(){			 
			    var filtro = $('#filtro').val();
			    
			    if(filtro==""){
			    	   window.location.reload();
			    }else{
				    $.ajax({
				        url: 'ofertaLaboral/indexFiltered/'+filtro,
				        type:'get',	            
				        success: function(response){
				            $('#ofertas').html(response);	               
				        },
				    	error: function(error){
				        	alert('error: '+error.message);
				    	}
				    })
			    }
			}
		</script>
		
		@if(session('message'))
			<div class="alert alert-success">
				<ul>
					<li><?php echo session('message'); ?></li>
				</ul>						
			</div>
		@endif
		
	
		<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h1>TRABAJO <small>Últimas publicaciones</small></h1>
			</div>
			<div class="col-xs-10 col-sm-6 col-md-6 col-lg-6">
<!-- 				<form class="navbar-form navbar-right" role="form"> -->
					<div class="form-group">
						<input type="text" id="filtro" class="form-control" placeholder="Buscar">
						<button class="btn btn-md boton" onclick="buscar()">Buscar</button>
					</div>
<!-- 				</form> -->
			</div>
		</div>
		<br>
		
		<div id="ofertas" class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
			@foreach($trabajos as $trabajo)
				<div class="container bordeTrab">
					<div class="row">						
						<a href="{{ url('ofertaLaboral/'.$trabajo->idOferta) }}"><h2>{{ $trabajo->titulo }}</h2></a>
						<small>{{ $trabajo->intro }}</small>
						<h4 class="text-right">{{ $trabajo->usuarioCreacion->name }}</h4>
					</div>
				</div>
			@endforeach
			
			<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
				<nav>
					<ul class="pager">
						<li class="previous"><a href="{{ $trabajos->previousPageUrl() }}">Anterior</a></li>
						<li><a href="{{ $trabajos->nextPageUrl() }}" class="next" style="color:#F0D431;">Siguiente</a></li>
					</ul>
				</nav>
			</div>		
		</div>
	</div>
	
@endsection
