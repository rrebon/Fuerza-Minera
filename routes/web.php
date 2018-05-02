<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use App\OfertaLaboral;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\Auth\RegisterController;
use Doctrine\DBAL\Schema\Index;
use App\Http\Controllers\ContactoController;


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
Auth::routes();

/*
 * Rutas de Prueba
 */

Route::get('/borrarSesion', function (){
	
// 	Session::flush();
//	$request->session()->flush();
// 	Session::start();
	Auth::logout();
	return view('welcome');
});

/*
 * Rutas Institucionales
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

/*
 * Rutas de los contactos
 */
Route::get('/contacto', ['as'=>'contacto', 'uses'=>'ContactoController@index']);

Route::post('/enviaConsulta', ['as'=>'enviaConsulta', 'uses'=>'ContactoController@Consultar']);

// Route::get('/home', function(){	
// 	return view('home');
// }); 

Route::get('/home', ['as'=>'home', 'uses'=>'HomeController@index']);


Route::get('/info', function (){
	return view('info');
});

/*
 * Rutas de Minas y Galerias
 */

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

/*
 * Rutas Multimediales
 */
//TODO: guardar registros del array en base de datos
Route::get('fotos', function(){
	$data = array(
				['titulo'=> 'Retro Escabadoras','imagen'=>'img/retro/0.jpg', 'enlace'=>url('/retro')],
				['titulo'=> 'Camiones','imagen'=>'img/camiones/0.jpg', 'enlace'=>url('/camiones')],
				['titulo'=> 'Cargadores Frontales','imagen'=>'img/cargFron/2.jpg', 'enlace'=>url('/cargFron')],
				['titulo'=> 'Perforadoras','imagen'=>'img/perfora/0.jpg', 'enlace'=>url('/perforadoras')],
				['titulo'=> 'Mina Aguilar','imagen'=>'img/minaAguilar/1.jpg', 'enlace'=>url('/minaAguilar')],
				['titulo'=> 'Mina Bajo de la Alumbrera','imagen'=>'img/minaAlumbrera/0.jpg', 'enlace'=>url('/minaAlumbrera')],
				['titulo'=> 'Mina Caposo','imagen'=>'img/minaCasposo/0.jpg', 'enlace'=>url('/minaCasposo')],
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

//TODO: guardar registros del array en base de datos
Route::get('videos', function(){
	$data = array(
			['nombre'=>'Zonas de perforación', 'url'=>'https://www.youtube.com/embed/P2mMfVn_66E'],
			['nombre'=>'Tronadura en Chuquicamata', 'url'=>'https://www.youtube.com/embed/DxtdpGXS7-A'],
			['nombre'=>'Tronadura por enaex', 'url'=>'https://www.youtube.com/embed/o3-IsrrsvaM'],
			['nombre'=>'Tronaduras a lo largo de los años', 'url'=>'https://www.youtube.com/embed/i9Ovce2qhQ0'],
			['nombre'=>'Voladura a 120 fps', 'url'=>'https://www.youtube.com/embed/zxdmMlPomXA'],
			['nombre'=>'Voladura a rajo abierto', 'url'=>'https://www.youtube.com/embed/dP0y9gEcWG8'],
			['nombre'=>'Voladura controlada', 'url'=>'https://www.youtube.com/embed/5APgG9WgEcI'],
			['nombre'=>'Voladura en mina Toquepala', 'url'=>'https://www.youtube.com/embed/VHnLl-Sje14'],
			['nombre'=>'Voladura en HD', 'url'=>'https://www.youtube.com/embed/ZMsCszRs0hc'],
			['nombre'=>'Voladura Interior Mina', 'url'=>'https://www.youtube.com/embed/Oo37BMJeWxo'],
			['nombre'=>'Voladura record en Tacoma', 'url'=>'https://www.youtube.com/embed/5UmlmC2lPfI'],
			['nombre'=>'Voladuras 2', 'url'=>'https://www.youtube.com/embed/SKQphJJLq7M'],
			['nombre'=>'Voladuras 1', 'url'=>'https://www.youtube.com/embed/VClUSugHHLM'],
			['nombre'=>'Voladuras Austin Powder', 'url'=>'https://www.youtube.com/embed/Xv44oPXy74E'],
			['nombre'=>'Voladuras en mina de oro en Australia', 'url'=>'https://www.youtube.com/embed/LZqwO0bdP7s'],
			['nombre'=>'Voladuras', 'url'=>'https://www.youtube.com/embed/5lPX_VqMfQU'],
			['nombre'=>'Maquinas Gigantes', 'url'=>'https://www.youtube.com/embed/0vmOI4vYQ8I'],
			['nombre'=>'¿Qué es el mineral de hierro?', 'url'=>'https://www.youtube.com/embed/Jv7jg0BW8Bk'],
			['nombre'=>'Chancado Primario R0', 'url'=>'https://www.youtube.com/embed/L5kOLcJ1xqE'],
			['nombre'=>'Exploraciones mineras, Atacama, Julio 2015', 'url'=>'https://www.youtube.com/embed/1G-sf65wE6s'],
			['nombre'=>'Diavik Diamonds', 'url'=>'https://www.youtube.com/embed/fGsWHKVWOl8'],
			['nombre'=>'Areas de tratamiento de mineral en Riotinto', 'url'=>'https://www.youtube.com/embed/lfswfT7dWtQ'],
			['nombre'=>'Simuladores en Codelco', 'url'=>'https://www.youtube.com/embed/xo-CsID8Mmw'],
			['nombre'=>'Nuevo nivel en mina Traspaso Andina', 'url'=>'https://www.youtube.com/embed/UDjhWxY79q0'],
			['nombre'=>'SafeWork at Glencore', 'url'=>'https://www.youtube.com/embed/KjvROQFHR4Y'],
			['nombre'=>'Remote Operations Delivering High Performance at High Altitude', 'url'=>'https://www.youtube.com/embed/BZorAVTUIu8'],
			['nombre'=>'Sublevel Caving Mining Method', 'url'=>'https://www.youtube.com/embed/TnA2mZ9N74s'],
			['nombre'=>'Tambor aglomerador', 'url'=>'https://www.youtube.com/embed/PsWtYxIbnaM'],
			['nombre'=>'Grasberg Mine', 'url'=>'https://www.youtube.com/embed/l0EWgO0lCek'],
			['nombre'=>'BHP Billiton', 'url'=>'https://www.youtube.com/embed/9U3_JVTPtns']			
	);
	
	return view('viewVideos', ['titulo'=>'Videos', 'columnas'=>3,'videos'=>$data]);
});

/*
 * Rutas de Noticias 
 */

Route::resource('noticia', 'NoticiasController'); 

Route::post('noticia/{noticia}/updatepost', ['as'=>'noticia.updatepost', 'uses'=>'NoticiasController@update']);

Route::post('noticia/{noticia}/deletepost', ['as'=>'noticia.deletepost', 'uses'=>'NoticiasController@destroy']);

// Route::get('noticias/create', 'NoticiasController@create');

// Route::get('noticia/{idNoticia}', 'NoticiasController@show');

Route::put('noticia/{idNoticia}/edit', 'NoticiasController@edit');

// Route::delete('noticia/{idNoticia}', 'NoticiasController@delete');

/*
 * Rutas de Ofertas Laborales
 */
Route::resource('ofertaLaboral', 'OfertasController');

//probando para ubicar el metodo update (no funciona igualemente)
Route::post('ofertaLaboral/{ofertaLaboral}/updatepost', ['as'=>'ofertaLaboral.updatepost', 'uses'=>'OfertasController@update']);

Route::post('ofertaLaboral/{ofertaLaboral}/deletepost', ['as'=>'ofertaLaboral.deletepost', 'uses'=>'OfertasController@destroy']);

// Route::get('ofertaLaboral', 'OfertasController@index');

// Route::get("ofertaLaboral/create", 'OfertasController@create')->middleware('auth.basic');

// Route::get('ofertaLaboral/{idOferta}', 'OfertasController@show');

// Route::get('ofertaLaboral/{idOferta}/edit', ['as'=>'ofertaLaboral.edit', 'uses'=>'OfertasController@edit'])->middleware('auth.basic');

// Route::put('ofertaLaboral/{idOferta}', 'OfertasController@update');

// Route::delete('ofertaLaboral/{idOferta}', 'OfertasController@delete')->middleware('auth.basic');

Route::get('ofertaLaboral/getDownload/{idOferta}', 'OfertasController@getDownload');

Route::get('ofertaLaboral/indexFiltered/{filtro}', 'OfertasController@indexFiltered');

/*
 * Rutas de Regristro de Usuarios (Empresas y Personas)
 */

//Route::resource('registro', 'Auth\RegisterController');
Route::get('registro', 'Auth\RegisterController@index');

Route::get('registro/actualizarStatus/{status}', 'Auth\RegisterController@actualizarSatus');


/**
 * Rutas de Informacion
 */

Route::resource('informacion', 'InformacionController');

Route::post('informacion/{info}/updatepost', ['as'=>'informacion.updatepost', 'uses'=>'InformacionController@update']);

Route::post('informacion/{info}/deletepost', ['as'=>'informacion.deletepost', 'uses'=>'InformacionController@destroy']);

Route::get('informacion/getDownload/{idInfo}', 'InformacionController@getDownload');






