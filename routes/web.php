<?php

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function(){
	return view('welcome');
});

Route::get('/quienesSomos', function (){
	return view('quienesSomos');
});

Route::get('/contacto', function (){
	return view('contacto');
});

Route::get('/registro', function (){
	return view('registro');
});

Route::get('/home', function(){
	return view('home');
});

Route::get('minaAguilar', function () {
	return view('viewGaleria', ['title' => 'Mina Aguilar',
							 'columnas' => 4,
							 'directorio' => 'img/minaAguilar/' 			
	]);
});
Route::get('minaAlumbrera', function () {
	return view('viewGaleria', ['title' => 'Mina Alumbrera',
			'columnas' => 4,
			'directorio' => 'img/minaAlumbrera/'
	]);
});
Route::get('minaCasposo', function () {
	return view('viewGaleria', ['title' => 'Mina Casposo',
			'columnas' => 4,
			'directorio' => 'img/minaCasposo/'
	]);
});
Route::get('minaFarallon', function () {
	return view('viewGaleria', ['title' => 'Mina Farallon',
			'columnas' => 4,
			'directorio' => 'img/minaFarallon/'
	]);
});
Route::get('minaGualca', function () {
	return view('viewGaleria', ['title' => 'Mina Gualca',
			'columnas' => 4,
			'directorio' => 'img/minaGualca/'
	]);
});
Route::get('minaNegro', function () {
	return view('viewGaleria', ['title' => 'Mina Negro',
			'columnas' => 4,
			'directorio' => 'img/minaNegro/'
	]);
});
Route::get('minaPascua', function () {
	return view('viewGaleria', ['title' => 'Mina Pascua',
			'columnas' => 4,
			'directorio' => 'img/minaPascua/'
	]);
});
Route::get('minaPirquitas', function () {
	return view('viewGaleria', ['title' => 'Mina Pirquitas',
			'columnas' => 4,
			'directorio' => 'img/minaPirquitas/'
	]);
});
Route::get('minaVang', function () {
	return view('viewGaleria', ['title' => 'Mina Vang',
			'columnas' => 4,
			'directorio' => 'img/minaVang/'
	]);
});
Route::get('minaVeladero', function () {
	return view('viewGaleria', ['title' => 'Mina Veladero',
			'columnas' => 4,
			'directorio' => 'img/minaVeladero/'
	]);
});
Route::get('cargFron', function () {
	return view('viewGaleria', ['title' => 'Cargadores Frontales',
			'columnas' => 4,
			'directorio' => 'img/cargFron/'
	]);
});
Route::get('camiones', function () {
	return view('viewGaleria', ['title' => 'Camiones',
			'columnas' => 4,
			'directorio' => 'img/camiones/'
	]);
});
Route::get('perforadoras', function () {
	return view('viewGaleria', ['title' => 'Perforadoras',
			'columnas' => 4,
			'directorio' => 'img/perfora/'
	]);
});
Route::get('retro', function () {
	return view('viewGaleria', ['title' => 'RetroExcavadoras',
			'columnas' => 4,
			'directorio' => 'img/retro/'
	]);
});
	Route::get('varias', function () {
		return view('viewGaleria', ['title' => 'Varias',
				'columnas' => 4,
				'directorio' => 'img/varias/'
		]);
	});

Route::get('fotos', function(){
	$data = array(
				['titulo'=> 'Retro Escabadoras','imagen'=>'img/retro/0.jpg', 'enlace'=>url('/retro')],
				['titulo'=> 'Camiones','imagen'=>'img/camiones/0.jpg', 'enlace'=>url('/camiones')],
				['titulo'=> 'Cargadores Frontales','imagen'=>'img/cargFron/2.jpg', 'enlace'=>url('/carFron')],
				['titulo'=> 'Perforadoras','imagen'=>'img/perfora/0.jpg', 'enlace'=>url('/perfora')],
				['titulo'=> 'Mina Aguilar','imagen'=>'img/minaAguilar/1.jpg', 'enlace'=>url('/minaAguilar')],
				['titulo'=> 'Mina Bajo de la Alumbrera','imagen'=>'img/minaAlumbrera/0.jpg', 'enlace'=>url('/minaAlumbrera')],
				['titulo'=> 'Mina Caposo','imagen'=>'img/minaCasposo/0.jpg', 'enlace'=>url('/minaCaposo')],
				['titulo'=> 'Mina Cerro Negro','imagen'=>'img/minaNegro/0.jpg', 'enlace'=>url('/minaNegro')],
				['titulo'=> 'Mina Cerro Vanguardia','imagen'=>'img/minaVang/0.jpg', 'enlace'=>url('/minaVang')],
				['titulo'=> 'Mina Farallon','imagen'=>'img/minaFarallon/0.jpg', 'enlace'=>url('/minaFarallon')],
				['titulo'=> 'Mina Gualcamayo','imagen'=>'img/minaGualca/0.jpg', 'enlace'=>url('/minaGualca')],
				['titulo'=> 'Mina Pascua-Lama','imagen'=>'img/minaPascua/0.jpg', 'enlace'=>url('/minaPascua')],
				['titulo'=> 'Mina Pirquitas','imagen'=>'img/minaPirquitas/0.jpg', 'enlace'=>url('/minaPirquitas')],
				['titulo'=> 'Mina Veladero','imagen'=>'img/minaVeladero/0.jpg', 'enlace'=>url('/minaVeladero')],
				['titulo'=> 'Varias','imagen'=>'img/varias/0.jpg', 'enlace'=>url('/varias')]			
			);
	return view('viewMozaicoImagenes',['title' => 'Fotos',
			'columnas' => 3,
			'data' => $data
	]);
});

Route::get('videos', function(){
	return view('viewVideos');
});

Route::get('trabajo', function(){
	return view('viewTrabajo');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
 
//Route::get('/post', 'PostController@index');

Route::resource('post', 'PostController');

Route::resource('ofertaLaboral', 'OfertasController');

Route::get('ofertaLaboral/borrar/{id}', 
		   ['as'=> 'ofertas/borrar', 'uses'=> 'OfertasController@borrar']);
Route::post('ofertaLaboral/buscar', ['as' => 'ofertas/buscar', 'uses' => 'OfertasController@buscar']);

// Route::get('ofertas/index', function(){
// 	return view('listTrabajos');
// });


