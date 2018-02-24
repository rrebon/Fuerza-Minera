<div class='container'>
	<div class='panel panel-primary'>
		<div class="panel-heading">
			<h3 class="panel-title">Datos Noticia</h3>
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
					{!! Form::text('titulo','', array('class'=>'form-control input-sm')) !!}
				</div>
				<div class="col-sm-1 hidden">
					{!! Form::label('fechaAlta','Fecha Publicación', array('class'=> 'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-5 hidden">
					{!! Form::text('fechaAlta', $fechaActual) !!} 
				</div>
			</div>
			<div class='row form-group'>
				<div class="col-sm-1">
					{!! Form::label('texto', 'Texto', array('class'=>'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-10">
					{!! Form::textarea('texto','', array('class'=>'form-control editor')) !!}
				</div>				
			</div>	
			<div class="row">
				<div class="col-sm-1">
					{!! Form::label('urlArchivo', 'Archivo información', array('class'=>'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::file('urlArchivo') !!}
				</div>
			</div>	
			<div class="pull-right">								
				{!! Form::submit($submitButtonText, array('class'=>'btn btn-primary'))!!}
				{!! Form::submit('Cancelar', array('class'=>'btn btn-primary'))!!}		
			</div>			
		</div>
	</div>
</div>
