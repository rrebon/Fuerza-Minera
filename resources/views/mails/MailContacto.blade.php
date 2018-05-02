
<div>
	<h4><strong>User: </strong>{{ $user->name  }}</h4>
	<h4><strong>Correo: </strong>{{ $user->email }} </h4>
	<?php  if($user->userable_type === 'App\Persona'):?>
		<h4><strong>Nombre y Apellido: </strong>{{ $user->userable->nombre.' '.$user->userable->apellido }} </h4>
	<?php else :?>
		<h4><strong>Razon Social: </strong>{{ $user->userable->razonSocial }}</h4>
	<?php endif;?>
	<p>{{ $mensaje }}</p>
</div>