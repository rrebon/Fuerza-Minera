@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    	<div class="col-md-3">
			<nav class="navbar navbar-default navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed"
							data-toggle="collapse" data-target="#barraHome">
							<span class="sr-only">Menu</span> <span class="icon-bar"></span>
							<span class="icon-bar"></span> <span class="icon-bar"></span>
						</button>
					</div>
				</div>
				<div class="collapse navbar-collapse" id="barraHome">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('home') }}">Mis Datos</a></li>						
						<li>
							<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">Trabajo <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('ofertaLaboral/create') }}">Nueva Oferta Laboral</a></li>								
							</ul>
						</li>
						<li>
							<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">Noticia <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('noticia/create') }}">Nueva Noticia</a></li>								
							</ul>
						</li>
						<li>
							<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">Información<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('informacion/create') }}">Nueva Información</a></li>
							</ul>							
						</li>						
						<li><a href="{{ url('borrarSesion') }}">LogOut</a></li>
					</ul>
				</div>
			</nav>
    	</div>
    	
    	
<?php 
	function mostrarUsuario($user){
		$html = "<table class='table table-condensed'>";
 		$html .= "<tr><td><strong>Usuario: </strong></td><td> ".$user->name." </td><td><strong>Email: </strong></td><td> ".$user->email." </td></tr>";
		$html .= "</table>";		
		return $html;
	}

	function mostrarPersona($persona){
		$html = "<table class='table table-condensed table-dark'>";
		$html .= "<tr><td><strong>Nombre: </strong></td><td> ".$persona->nombre." </td><td><strong>Apellido:</strong> </td><td> ".$persona->apellido." </td></tr>";
		$html .= "<tr><td><strong>Telefono:</strong> </td><td>".$persona->telefono."</td><td></td><td></td></tr>";
		$html .= "</table>";
		return $html;
	}
	
	function mostrarEmpresa($empresa){
		$html = "<table class='table table-condensed table-dark'>";
		$html .= "<tr><td><strong>Razón social:</strong></td><td>".$empresa->razonSocial."</td><td></td><td></td>";
		$html .= "<tr><td>telefono:</td><td>".$empresa->telefono."</td><td>telefono2</td><td>".$empresa->telefono2."</td></tr>";
		$html .= "<tr><td>Dirección:</td><td>".$empresa->direccion."</td><td>Localidad:</td><td>".$empresa->localidad."</td></tr>";
		$html .= "</table>";
		return $html;
	}
?>
    	
<!--     	Este seria el contenido del panel al aldo del menu -->
    	
        <div class="col-md-9"> <!-- col-md-offset-2 -->
            <div class="panel panel-default">
                <div class="panel-heading">Datos de usuario</div>

                <div class="panel-body">
                <div class="row">               
                	
                		<div class="table-responsive">
                		<?php echo mostrarUsuario($user); ?>
                		</div>
                		<div class="table-responsive">
                			<?php
	                			if($user->userable_type === 'App\Persona'){
	                				echo mostrarPersona($relacion);
	                			}else{
	                				echo mostrarEmpresa($relacion);
	                			}
                			?>	                	
                		</div>
                		
                	
                </div>
                </div>                
            </div>
        </div>
    </div>
</div>


@endsection
