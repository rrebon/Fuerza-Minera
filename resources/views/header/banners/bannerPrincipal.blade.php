
<div style="position: absolute"
	class="container-fluid-propio col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<!--BANNER-->
	<div style="background-image:url('{{ URL::asset('img/banner.jpg') }}'); height: 200px;"
		class="hidden-xs"></div>
	<div style="background-image:url('{{ URL::asset('img/banner.jpg') }}'); height: 150px;"
		class="visible-xs"></div>
</div>
<div class="logo container">
	<a href="{{ url('/welcome') }}"><img src="{{ url('img/logo.jpg') }}" alt=""
		class="img-responsive hidden-xs"></a> <a href="index.html"><img
		src="{{ url('img/logoResp.jpg') }}" alt="" class="img-responsive visible-xs"></a>
</div>
