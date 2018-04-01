@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    	<div class="col-md-3">
			<nav class="navbar navbar-default navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed"
							data-toggle="collapse" data-target="#barra">
							<span class="sr-only">Menu</span> <span class="icon-bar"></span>
							<span class="icon-bar"></span> <span class="icon-bar"></span>
						</button>
					</div>
				</div>
				<div class="collapse navbar-collapse" id="barra">
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
    	
<!--     	Este seria el contenido del panel al aldo del menu -->
    	@yield('contenido')
        <div class="col-md-9"> <!-- col-md-offset-2 -->
            <div class="panel panel-default">
                <div class="panel-heading">Panel de control</div>

                <div class="panel-body">
                    Bienvenido {{ $user->name }}
                    <div class="row">
                	<?php
                		if($user->userable_type = 'App/Persona'){
                			echo $relacion->nombre.', '.$relacion->apellido;                 			
                		}else{
							echo $relacion->razonSocial;
                		}
                	?>
                </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
