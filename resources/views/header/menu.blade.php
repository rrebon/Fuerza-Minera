<?php
use Illuminate\Support\Facades\Auth;
?>
<!--BARRA DE NAVEGACION-->
<div class="container-fluid">	
	<div class="row">
		<header>
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
						<li><a href="{{ url('quienesSomos') }}">¿Quiénes somos?</a></li>
						<li><a href="{{ url('contacto') }}">Contactos</a></li>
						<li><a href="{{ url('ofertaLaboral') }}">Trabajo</a></li>
						<li><a href="{{ url('noticia') }}">Noticias</a></li>						
						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">Media <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('fotos') }}">Fotos</a></li>
								<li><a href="{{ url('videos') }}">Videos</a></li>
							</ul>
						</li>
						<li><a href="{{ url('informacion') }}">Información</a></li>						
						
						@if(Auth::check()) 							
							<li><a href="{{ url('home') }}">Home</a></li>
							<li><a href="{{ url('borrarSesion') }}">LogOut</a></li>
						@else
							<li><a href="{{ url('registro') }}">Registro</a></li>							
						@endif						
						
					</ul>
				</div>
			</nav>
		</header>
	</div>
</div>

