@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Nueva Noticia</h1>
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


{!! Form::model(array('action' => ['NoticiasController@update'], 'role'=>'form', 'files'=>true)) !!}
	@include('noticia.forms.formNoticia', ['submitButtonText' => 'Modificar Noticia', 'noticia'=>$noticia])
{!! Form::close() !!}}
	
@endsection