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
					{!! Form::text('titulo',isset($noticia)?$noticia->titulo:'', array('class'=>'form-control input-sm')) !!}
				</div>
				<div class="col-sm-1 hidden">
					{!! Form::label('fechaAlta','Fecha Publicación', array('class'=> 'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-5 hidden">
					{!! Form::text('fechaAlta', $fechaActual) !!} 
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-1">
					{!! Form::label('intro','Introducción', array('class'=> 'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-10">
					{!! Form::text('intro',isset($noticia)?$noticia->intro:'', array('class'=>'form-control input-sm')) !!}
				</div>
			</div>
			<div class='row form-group'>
				<div class="col-sm-1">
					{!! Form::label('texto', 'Texto', array('class'=>'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-10">
					{!! Form::textarea('texto',isset($noticia)?$noticia->texto:'', array('class'=>'form-control editor')) !!}
				</div>				
			</div>	
			<div class="row">
				<div class="col-sm-1">
					{!! Form::label('urlImagenIntro', 'Archivo intro', array('class'=>'etiquetaNegra')) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::file('urlImagenIntro') !!}
				</div>
			</div>	
			<div class="pull-right">				
				{!! Form::submit($submitButtonText, array('class'=>'btn btn-primary'))!!}
				{!! Form::button('Cancelar', array('class'=>'btn btn-primary', 'onclick'=>$onClick))!!}		
			</div>			
		</div>
	</div>
</div>

<!-- INICIO SCRIPTS -->

<!--  scripts inicio content -->
	<script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
	<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<!-- 	fin scripts inicio content -->

<!-- <textarea value="{{old('description')}}" class="form-control editor" name="description" rows="10" cols="50"></textarea> -->

<!-- script fin content -->
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.editor",
//     plugins: [
//       "advlist autolink lists link image charmap print preview hr anchor pagebreak",
//       "searchreplace wordcount visualblocks visualchars code fullscreen",
//       "insertdatetime media nonbreaking save table contextmenu directionality",
//       "emoticons template paste textcolor colorpicker textpattern codesample",
//       "fullpage toc tinymcespellchecker imagetools help"
//     ],
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern codesample",
      "fullpage imagetools save"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
//     external_plugins: { "nanospell": "http://localhost/js/tinymce/plugins/nanospell/plugin.js" },
//     nanospell_server:"php",
//     browser_spellcheck: true,
//     relative_urls: false,
//     remove_script_host: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinymce.activeEditor.windowManager.open({
        file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
        title: 'Administrador de Archivos',
        width: 900,
        height: 450,
        resizable: 'yes'
      }, {
        setUrl: function (url) {
          win.document.getElementById(field_name).value = url;
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>
<script>
  {!! \File::get(base_path('vendor/barryvdh/laravel-elfinder/resources/assets/js/standalonepopup.min.js')) !!}
</script>

<!-- FIN SCRIPTS -->
