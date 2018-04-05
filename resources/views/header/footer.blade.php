<!--FOOTER-->

	<div class="container-fluid">
		<div class="row">
			<div style="position: absolute"
				class="container-fluid-propio col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div style="background-image: url({{ asset('img/banner.jpg') }}); height: 185px;"></div>
			</div>
			<div class="icono col-xs-12 col-sm-4 col-md-4 col-lg-4"
				style="padding-top: 10px; padding-left: 0px; padding-right: 0px;">
				<h3 style="color: white;" class="hidden-xs">Síguenos en:</h3>
				<div class="icono col-xs-4 col-sm-4 col-md-4 col-lg-3">
					<a
						href="https://www.youtube.com/channel/UCdvNo9PVE5VdPojFlL5Rr2Q/featured"><img
						src="{{ asset('img/icoYou.png') }}" alt="" class="img-responsive"></a>
				</div>
				<div class="icono col-xs-4 col-sm-4 col-md-4 col-lg-3">
					<a href="http://twitter.com/FUERZAMINERA"><img src="{{ asset('img/icoTw.png') }}"
						alt="" class="img-responsive"></a>
				</div>
				<div class="icono col-xs-4 col-sm-4 col-md-4 col-lg-3">
					<a href="https://www.facebook.com/fuerza.minera/?fref=ts"><img
						src="{{ asset('img/icoFace.png') }}" alt="" class="img-responsive"></a>
				</div>
				<div class="icono col-xs-4 col-sm-4 col-md-4 col-lg-3">
					<a href="https://www.instagram.com/fuerza_minera/"><img
						src="{{ asset('img/logoinsta.png') }}" alt="" class="img-responsive" width="50" height="50"></a>
				</div>
			</div>
			<div
				class="icono hidden-xs col-sm-4 col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1"
				align="center">
				<img src="{{ asset('img/logo.jpg') }}" alt="" class="img-responsive">
				<h5 style="color: white">Copyright ©</h5>
			</div>
			<div class="icono col-sm-4 col-md-4 col-lg-4" align="right"
				style="padding-right: 40px">
				<h3 style="color: white" class="hidden-xs">Desarrolladores</h3>
				<h4 style="color: white" class="hidden-xs">
					Ing. Ricardo Rebón <small>sony.rebon@gmail.com</small>
				</h4>
				<h4 style="color: white" class="hidden-xs">
					Lucía Córdoba <small>lucia_cordoba_@hotmail.com.ar</small>
				</h4>
			</div>
			<div class="icono col-xs-12 text-center">
				<h4 style="color: white" class="visible-xs">Desarrolladores</h4>
				<h5 style="color: white" class="visible-xs">
					Ing. Ricardo Rebón <small>sony.rebon@gmail.com</small> <br> Lucía
					Córdoba <small>lucia_cordoba_@hotmail.com.ar</small>
				</h5>
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
    selector: "#editorNoticia",
   // images_upload_base_path: '<?= storage_path('app/public/') ?>',
   // location: '/',
    relative_urls : false,
    remove_script_host : false,
    convert_urls : true,
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
	
	


<!-- FIN FOOTER -->