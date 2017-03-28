@extends('layouts.app')

		<script type="text/javascript">

		function mostrar(id) {
			if (id == "nada") {
				$("#nada").show();
		        $("#persona").hide();
		        $("#empresa").hide();
		    }

		    if (id == "persona") {
		    	$("#nada").hide();
		        $("#persona").show();
		        $("#empresa").hide();
		    }

		    if (id == "empresa") {
		    	$("#nada").hide();
		        $("#persona").hide();
		        $("#empresa").show();
		    }
		}
		</script>

@section('content')

<!--REGISTRO-->
		<div class="container">
			<h1>REGISTRARSE</h1>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<form action="index.php" method="post">
					  		  <h2>Seleccione una opción:</h2> 
							    <select id="status" name="status" onChange="mostrar(this.value);" class="form-control" style="padding: 15px 12px; font-size: 15px;">
	  								<option value="nada" selected>-</option>
							        <option value="persona">Persona</option>
							        <option value="empresa">Empresa</option>
							     </select>
							</form>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div id="nada">
							</div>

							<div id="persona" style="display: none;">
							   	<h2>Persona</h2>
							   	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								   	<label style="color:black;">Nombre:</label>
								   	<input type="text" placeholder="Nombre" name="nombre" class="form-control" style="font-size:15px; height:35px" ">
							   	</div>
							   	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								   	<label style="color:black;">Apellido</label>
								   	<input type="text" placeholder="Apellido" name="apellido" class="form-control" style="font-size:15px; height:35px" ">
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								   	<label style="color:black;">Mail</label>
								   	<input type="text" placeholder="Mail" name="mail" class="form-control control-label" style="font-size:15px; height:35px" ">
								</div>
								<div class="col-xs-12 col-sm-6  col-md-offset-9 col-md-3 col-lg-offset-9 col-lg-3">
									<input class="form-control btn-sm boton" type="submit" value="Registrarme" name="registrar" id="registrar">
								</div>
							</div>
									
							<div id="empresa" style="display: none;">
								<h2>Empresa</h2>
							   	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								   	<label style="color:black;">Nombre de la empresa:</label>
								   	<input type="text" placeholder="Nombre de la empresa" name="nombreempresa" class="form-control" style="font-size:15px; height:35px" ">
							   	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
