<!DOCTYPE html>
<html lang="en">

	@component('header.header')
	@endcomponent

	<body>

		@component('header.banners.bannerPrincipal')
		@endcomponent
		
		@component('auth.LoginF')
		@endcomponent
		<!-- 	Esta es la seccion del menu -->
		
		@component('header.menu')
		@endcomponent
	
		<!-- sección de contenido --> 
		@yield('content')
		
	
		<!-- sección de pie de página -->
		@component('header.footer')
		@endcomponent 
		

	</body>
</html>





