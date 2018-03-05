@extends('layouts.app')

@section('content')

<div class="row">
	<div class='col-md-6 col-md-offset-3'>
		<h1>Editar Oferta Laboral</h1>
	</div>
</div>

<hr>
{!! Form::model($ofertaLaboral, array('route' => ['ofertaLaboral.edit', $ofertaLaboral->idOferta],'method' => 'PATCH', 'class'=>'form-horizontal')) !!}
	@include('oferta.forms.formOfertaLaboral', ['submitButtonText' => 'Editar Oferta', 'oferta'=>$ofertaLaboral])
{!! Form::close() !!}


@endsection