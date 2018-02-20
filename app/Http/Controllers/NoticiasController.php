<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia as Noticia;
use App\User as User;
use App\Http\Requests\NoticiaRequest as NoticiaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class NoticiasController extends Controller
{
	
	public function index(){
		$noticias = Noticia::orderBy('fechaAlta','desc')->simplepaginate(3);
		return view('noticia.viewNoticias', ['noticias'=>$noticias]);
	}
	
	public function create(){
		return view('noticia.forms.createNoticia');
	}
	
	public function store(NoticiaRequest $request){
		$disk = Storage::disk();
		$path = "";
		
		$path = $request->urlImagenIntro->store('public/noticias');		
		
// 		$path = \Storage::putFile('public/noticias', $request->file('urlImagenIntro'));
// 		if($archivo)
// 			$path = $archivo->store('public/noticias');

		$input = $request->all();
		//hago la conversion de la fecha con el formato correspondiente
		$input['fechaAlta'] = date_create_from_format("d/m/Y", $input['fechaAlta']);
		
		$input['idUsuarioCreacion'] = \Auth::user()->id;
		$input['urlImagenIntro'] = $path;
		
		//lo hago vacio, por ahora no se usa
		$input['urlCarpetaImagenes'] = "";
		
		Noticia::create($input);	
		
		return redirect('noticia');
	}
	
	public function show($idNoticia){
		$noticia = Noticia::find($idNoticia);
		return view('noticia.viewNoticia', ['noticia'=>$noticia]);
	}
	
	
// 	private function almacenarArchivo(File $archivo){
// 		return Storage::putFile('public/noticias', $archivo);
// 	}
	

}
