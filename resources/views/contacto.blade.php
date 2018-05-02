@extends('layouts.app')

@section('content')
<!--CONTACTOS-->
	<div class="container">
	
		@if(session('error'))
			<div class="alert alert-danger">
				<ul>
					<li><?php echo session('error'); ?></li>
				</ul>						
			</div>
		@endif
		@if(session('message'))
			<div class="alert alert-success">
				<ul>
					<li><?php echo session('message'); ?></li>
				</ul>						
			</div>
		@endif
		@if(session('failures'))
			<div class="alert alert-danger">
				<ul>
					<?php
						foreach (session('failures') as $fail){
							echo '<li> No se pudo enviar el correo a: '. $fail .'</li>';
						}				
					?>					
				</ul>						
			</div>
		@endif

		<h1>Contacto</h1>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h3 style="padding:15px;" align="center">Teléfonos:<br><small style="padding:15px;">011-1564058279</small>
				<br>
				<br>
				Mail:<br><small style="padding:15px;">fuerzaminera@fuerzaminera.com.ar</small>
				<br>
				<br>
				Dirección:<br><small style="padding:15px;">San Rafael Oeste 1698, San Juan, Argentina

</small></h3>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<form action="{{ url('/enviaConsulta') }}" method="post">
				{!! csrf_field() !!}
					<h3>Escribe tu consulta</h3>
					<textarea class="form-control" placeholder="Escribe Aquí" name="mensaje" id="" cols="30" rows="10"></textarea>
					<input class="form-control btn-sm boton" type="submit" value="Enviar" name="enviar" id="enviar">	
				</form>				
			</div>
		</div>
	</div>
@endsection