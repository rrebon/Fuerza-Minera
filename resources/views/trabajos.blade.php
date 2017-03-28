@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			{!! Form::open(['route' => 'ofertas.guardar', 'method' => 'post',
			'novalidate']) !!}
			<div class="form-group">{!! Form::label('titulo', 'Titulo') !!}
				{!! Form::text('titulo', null, ['class' => 'form-control' , 'required'
				=> 'required']) !!}</div>
			<div class="form-group">{!! Form::label('texto',
				'Descripci&oacute;n') !!} 
				{!! Form::text('texto', null,
				['class' => 'form-control' , 'required' => 'required']) !!}</div>
			<div class="form-group">{!! Form::submit('Guardar', ['class' => 'btn
				btn-success ' ] ) !!}</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
