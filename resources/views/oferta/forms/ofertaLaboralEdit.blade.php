@extends('layouts.app')

@section('content')

<div class='col-md-6 col-md-offset-3'>
<h1>Editar Oferta Laboral</h1>

<hr>
{!! Form::model($ofertaLaboral, array('route' => ['OfertaLaboralController@update', $ofertaLaboral->idOferta], 'class'=>'form-horizontal')) !!}
{!! Form::model($oferta, ['method' => 'PATCH', 'action' => ['OfertaController@update',$oferta->id]]) !!}
	@include('forms.formOfertaLaboral', ['submitButtonText' => 'Editar Oferta'])
{!! Form::close() !!}

</div>
@stop