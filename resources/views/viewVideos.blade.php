@extends('layouts.app')

@section('content')
<div class="container">
	<h1>MEDIA <small>{{ $titulo }}</small></h1>
	<div class="row">
	@php $i=0 @endphp
	@foreach($videos as $video)
		@if($i==0)
			<div class="row">
		@endif
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 thumbnail">
			
				<div class="embed-responsive embed-responsive-4by3">
 					 <iframe class="" src="{{ $video['url'] }}"  allowfullscreen ></iframe>
				</div>
				<div class="caption">
					<h3 class="hidden-xs"> {{ $video['nombre'] }} </h3>
					<h6 class="visible-xs">{{ $video['nombre'] }}</h6>
				</div>
			</div>
		@php $i++ @endphp		
		@if($i==$columnas)
			</div>
			@php $i=0 @endphp
		@endif
	@endforeach
	
	@if($i!=0)
	</div>
	@endif
	</div>
</div>
@endSection




