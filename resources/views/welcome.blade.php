
<!DOCTYPE html>
<html lang="en">
@component('header.header')
@endcomponent

<body>

	<img src="img/header.jpg" alt="" class="img-responsive hidden-xs">
	<img src="img/headerXS.jpg" alt="" class="img-responsive visible-xs">
	
	@component('auth.LoginF')
	@endcomponent
	

 	@component('header.menu') 
 	@endcomponent 
    
	<div class="container"> <!--DETALLES-->
		<div class="row">
			<h1 class="hidden-xs">Por una minería más sustentable y una mayor aprobación social.</h1>
			<h2 class="visible-xs" style="font-family:bebaskai;color: #F0D431">Por una minería más sustentable y una mejor aprobación social.</h2>
		</div>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<a href="img/home1.jpg" data-lightbox="imagen"><img src="img/home1.jpg" alt="" class="img-responsive"></a>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<a href="img/home2.jpg" data-lightbox="imagen"><img src="img/home2.jpg" alt="" class="img-responsive"></a>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<a href="img/home3.jpg" data-lightbox="imagen"><img src="img/home3.jpg" alt="" class="img-responsive"></a>
			</div>
		</div>
	</div>

	<!-- sección de pie de página -->
	@component('header.footer') @endcomponent


</body>
</html>
