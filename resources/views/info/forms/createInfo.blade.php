
@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Nueva Informacion</h1>
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

{!! Form::open(array('action' => ['InformacionController@store'], 'role'=>'form', 'files'=>true)) !!}
	@include('info.forms.formInfo', ['submitButtonText' => 'Nueva Información', 'onclick'=>$onClick])
{!! Form::close() !!}}
	
@endsection