
<div class='container'>
	<div class='panel panel-primary'>
		<div class="panel-heading">
			<h3 class="panel-title">Datos Oferta Laboral</h3>
		</div>
		<div class="panel-body center-block" style="width:95%">
			<?php
				$user = Auth::user();
				$fechaActual = Carbon\Carbon::now()->format("d/m/Y");				
			?>
			
			<div class='row form-group'>
				<div class="col-sm-1">
					{!! Form::label('titulo','Título', array('class'=> 'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-5">
					{!! Form::text('titulo',isset($oferta)?$oferta->titulo:'', array('class'=>'form-control input-sm')) !!}
				</div>
				<div class="col-sm-1">
					{!! Form::label('fechaAlta','Fecha Publicación', array('class'=> 'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-5">
					{!! Form::text('fechaAlta', $fechaActual) !!} 
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-1">
					{!! Form::label('intro','Introducción', array('class'=> 'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-10">
					{!! Form::text('intro',isset($oferta)?$oferta->intro:'', array('class'=>'form-control input-sm')) !!}
				</div>
			</div>
			<div class='row form-group'>
				<div class="col-sm-1">
					{!! Form::label('texto', 'Texto', array('class'=>'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-10">
					{!! Form::textarea('texto',isset($oferta)?$oferta->texto:'', array('class'=>'form-control')) !!}
				</div>				
			</div>	
			<div class="row">
				<div class="col-sm-1">
					{!! Form::label('urlArchivo', 'Archivo', array('class'=>'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::file('urlArchivo') !!}
					<?php $url=isset($oferta)?$oferta->urlArchivo:''; 
							if ($url!='') {
								$position=strpos($url,'/');
								$url=substr($url,$position);
							}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2 col-md-offset-1">
					<img alt="" style="width: auto;height: auto; max-width: 70px;" src="{{ url('/')}}/storage<?php echo $url?>">
				</div>
			</div>	
			<div class="pull-right">								
				{!! Form::submit($submitButtonText, array('class'=>'btn btn-primary'))!!}
				{!! Form::button('Cancelar', array('class'=>'btn btn-primary', 'onclick'=>$onClick))!!}		
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">


	$('#fechaAlta').datepicker({
	    format: "dd/mm/yyyy",
	    maxViewMode: 3,
	    defaultDate: new Date(),
	    language: "es",
	    daysOfWeekHighlighted: "0,6"
	});

	
</script>

