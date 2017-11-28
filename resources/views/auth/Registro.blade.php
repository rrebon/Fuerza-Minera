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
					<form action="" method="post">
						<h2>Seleccione una opción:</h2>
						<select id="status" name="status" onChange="mostrar(this.value);"
							class="form-control" style="padding: 15px 12px; font-size: 15px;">
							<option value="nada" selected>-</option>
							<option value="persona">Persona</option>
							<option value="empresa">Empresa</option>
						</select>
					</form>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div id="nada"></div>

					<div id="persona" style="display: none;">
						<form method="POST" action="{{ url('/register') }}">
							<h2>Persona</h2>
							<!-- agrego el component que carga los datos de usuario -->
							
							@component('auth.RegistroPersona') @endcomponent
							<div
								class="col-xs-12 col-sm-6  col-md-offset-9 col-md-3 col-lg-offset-9 col-lg-3">
								<input class="form-control btn-sm boton" type="submit"
									value="Registrarme" name="registrar" id="registrar">
							</div>
						</form>
					</div>

					<div id="empresa" style="display: none;">
						<form method="POST" action="{{ url('/register') }}">
							<h2>Empresa</h2>
							<!-- agrego el componente que carga los datos de usuario -->
							
							@component('auth.RegistroEmpresa') @endcomponent
							<div
								class="col-xs-12 col-sm-6  col-md-offset-9 col-md-3 col-lg-offset-9 col-lg-3 form-group">
								<input class="form-control btn-sm boton" type="submit"
									value="Registrarse " name="registrar" id="registrar">
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
