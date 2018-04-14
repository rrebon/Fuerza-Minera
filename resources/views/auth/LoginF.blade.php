
<div class="registro col-xs-6 col-xs-offset-6 col-sm-3 col-sm-offset-9 col-md-3 col-md-offset-9 col-lg-3">
	<form class="text-right form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
				<label for="email" class="hidden-xs">Email:</label>
				<input class="form-control" type="text" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required autofocus>
				@if ($errors->has('email')) 
					<span class="help-block"> 
						<strong>{{ $errors->first('email') }}</strong>
					</span> 
				@endif
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
				<label for="contraseña" class="hidden-xs">Contraseña:</label>
				<input class="form-control" type="password"placeholder="Contraseña" name="password" id="password" required>
				@if ($errors->has('password')) 
					<span class="help-block"> 
						<strong>{{ $errors->first('password') }}</strong>
					</span> 
				@endif
			</div>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<?php $user=Auth::user(); ?>
		@if(Auth::check())
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<label>{{ "Bienvenido, ".$user->name }}</label>
			</div>
		@endif
		</div>
		@if(Auth::check()==false)
		<div class="col-xs-4  col-sm-4 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-6 hidden-xs">
		
			<input class="form-control btn-sm boton" type="submit"
				value="Ingresar" name="ingresar" id="ingresar"> <a
				href= "{{ url('/registro') }}" style="font-size: 15px; color: #F0D431">Registrarse</a>
		</div>
		@endif
		<div class="row visible-xs">
			<!--REGISTRO RESONSIVE-->
			<div class="col-xs-6 col-sm-6 col-md-12 col-lg-6 col-lg-offset-6">
				<input class="form-control btn-sm boton hidden-xs" type="submit" value="Ingresar" name="ingresar" id="ingresar"> 
				<a href="{{ url('auth.registro') }}" class="hidden-lg hidden-md hidden-sm btn btn-sm boton">Ingresar</a>					
			</div>
			@if(Auth::check()==false)
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<a href="{{ url('auth.registro') }}" style="font-size: 15px; color: #F0D431">Registrarse</a>
			</div>
			@endif
		</div>		

	</form>
</div>
