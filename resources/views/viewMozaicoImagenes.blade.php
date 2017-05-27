@extends('layouts.app')

@section('content')

<!--MEDIA-->
	<div class="container">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h1>Fotos <small>{{$title}}</small></h1>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<a href="{{ url()->previous() }}"><button class=" btn btn-lg boton">Volver</button></a>
			</div>
		</div>
      </div>
		<div class="container">
        	<?php         	
			$i=0; //contador
       		foreach ($data as $d){
	       			
	       			if($i===0)
	       				echo '<div class="row">';
	       			
	       				echo "<div class='col-xs-6 col-sm-4 col-md-4 col-lg-4 thumbnail'>
	       						<a href='{$d['enlace']}'><img src='{$d['imagen']}'></a>
	       						<div class='caption'>
	       							<h3 class='hidden-xs'>{$d['titulo']}</h3>
       								<h4 class='visible-xs'>{$d['titulo']}</h4>
       							</div>
       						</div>";    				
	       				$i++;
	       		if($i==$columnas){//cantidad de columnas
	       			echo '</div>';	       			
	       			$i=0;
	       		}    			
     		}     		
     		if($i!=0)
     			echo '</div>';    			
      		?>
 	</div> 

@endsection
