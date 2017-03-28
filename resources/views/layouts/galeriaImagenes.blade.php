<!--MEDIA-->
	<div class="container">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h1>Fotos <small>{{$title}}</small></h1>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<a href="fotos.html"><button class=" btn btn-lg boton">Volver</button></a>
			</div>
		</div>
			<?php
				$discoLocal=Storage::disk('publicLocal');        	
         		$archivos=$discoLocal->files($directorio);  
         		$i=0; //contador
         	?>
		
			@foreach($archivos as $archivo)
				@if($i==0)
				<div class="row">
				@endif
					<div class='col-xs-6 col-sm-3 col-md-3 col-lg-3 thumbnail'>
						<a href="{{ $archivo }}" data-lightbox='imagen'><img src="{{ $archivo }}"></a>
       				</div>   
       			@php $i++ @endphp
       			
       			@if($i==$columnas->__toString())
       			</div>
       			@php $i=0 @endphp
       			@endif
       				   								
			@endforeach
				
		 @if($i!=0)
		 	</div>
		 @endif

	</div>
	
	<!-- FIN MEDIA -->
		
		
		