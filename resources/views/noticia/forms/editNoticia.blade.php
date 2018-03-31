@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Modificar Noticia</h1>
	</div>
</div>


@if (count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }} </li>
			@endforeach
		</ul>
	</div>
@endif

<hr>

<?php
	$previousUrl =  url()->previous();
	$onClick = "redirigir('".$previousUrl."')";
	
?>

{!! Form::model($noticia,array('route' => ['noticia.updatepost', $noticia->idNoticia],
					  	'method'=> 'POST', 
					  	'role'=>'form', 
					  	'files'=>true)) !!} 
	@include('noticia.forms.formNoticia', ['submitButtonText' => 'Modificar Noticia', 'noticia'=>$noticia,'onclick'=>$onClick])
{!! Form::close() !!}}
	



@endsection