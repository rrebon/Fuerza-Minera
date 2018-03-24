@extends('layouts.app')

@section('content')

<div class="row">
	<div class='col-md-6 col-md-offset-3'>
		<h1>Editar Oferta Laboral</h1>
	</div>
</div>

<hr>
{!! Form::Model($ofertaLaboral, array('route' => ['ofertaLaboral.updatepost',
												   $ofertaLaboral->idOferta],
												   'method' => 'POST', 
												   'class'=>'form-horizontal', 
												   'role'=>'form', 
												   'files'=>true)) !!}
	@include('oferta.forms.formOfertaLaboral', ['submitButtonText' => 'Editar Oferta', 'oferta'=>$ofertaLaboral])
{!! Form::close() !!}


@endsection