
@extends('layouts.app')

@section('content')
<div class="row">
	<div class='col-md-6 col-md-offset-3'>
		<h1>Nueva Oferta Laboral</h1>	
	</div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<hr>

{!! Form::open(array('action' => ['OfertasController@store'], 'role'=>'form', 'files'=>true)) !!}
	@include('oferta.forms.formOfertaLaboral', ['submitButtonText' => 'Nueva Oferta'])
{!! Form::close() !!}


@endsection