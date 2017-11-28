 {{ csrf_field() }}

<div
	class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label class="etiquetaNegra">Nombre Usuario</label>
	<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
	@if ($errors->has('name')) 
	  <span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span> 
	@endif
</div>

<div
	class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<label class="etiquetaNegra">E-Mail</label> 
	<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
	@if ($errors->has('email')) 
		<span class="help-block"> <strong>{{ $errors->first('email') }}</strong></span> 
	@endif
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	<label class="etiquetaNegra">Contraseña</label> 
	<input id="password" type="password" class="form-control" name="password" required> 
		@if	($errors->has('password')) 
			<span class="help-block"> <strong>{{$errors->first('password') }}</strong></span> 
		@endif
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
	<label class="etiquetaNegra">Confirme la Contraseña</label> 
	<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
</div>


