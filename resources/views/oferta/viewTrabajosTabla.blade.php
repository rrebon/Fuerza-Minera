extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		{!! Form::open(['route' => 'ofertas/buscar', 'method' => 'post',
		'novalidate', 'class' => 'form-inline']) !!}
		<div class="form-group">
			<label for="exampleInputName2">Name</label> <input type="text"
				class="form-control" name="name">
		</div>
		<button type="submit" class="btn btn-default">Search</button>
		<a href="" class="btn btn-primary">All</a> <a href=""
			class="btn btn-primary">Create</a> {!! Form::close() !!} <br>
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr>
					<th>titulo</th>
					<th>texto</th>
					<th>usuario creacion</th>
					<th>acccion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($trabajos as $trabajo)
				<tr>
					<td>{{ $trabajo->titulo }}</td>
					<td>{{ $trabajo->texto }}</td>
					<td>{{ $trabajo->usuarioCreacion->name }}</td>
					<td><a class="btn btn-primary btn-xs" href="">Edit</a> <a
						class="btn btn-danger btn-xs" href="">Delete</a></td>

				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
