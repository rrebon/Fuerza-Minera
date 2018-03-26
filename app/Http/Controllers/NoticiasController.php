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
	
	public function edit ($idNoticia){
		$noticia = Noticia::find($idNoticia);
		
		return view('noticia.forms.editNoticia', compact('noticia'));
		//return view('noticia.forms.editNoticia', ['noticia'=>$noticia]);
	}
	
	public function update($idNoticia, NoticiaRequest $request){
		$noticia = Noticia::findorfail($idNoticia);
		
		$disk = Storage::disk();				
		
		$path = storage_path('app/'.$noticia->urlImagenIntro);
		
		//si el request tiene un archivo
		//borro el que tiene y seteo el nuevo
		if(isset($request->urlImagenIntro)){
			if(file_exists($path)){
				unlink($path);
			}
			$path = $request->urlImagenIntro->store('public/noticias');
		}
		
		
		$input = $request->all();		
				
		//guardo la ruta donde esta guardada la imagen
		$input['urlImagenIntro'] = $path;
		
		//lo hago vacio, por ahora no se usa
		$input['urlCarpetaImagenes'] = "";
			
		$noticia->titulo = $input['titulo'];
		$noticia->intro = $input['intro'];
		$noticia->texto = $input['texto'];
		$noticia->urlImagenIntro = $input['urlImagenIntro'];	
		
		$noticia->save();
		
		
		return redirect('noticia');		
	}
	
	public function destroy($idNoticia){
		$noticia = Noticia::findOrFail($idNoticia);
		
		$path = storage_path('app/'.$noticia->urlImagenIntro);
		
		if(isset($request->urlImagenIntro))
			if(file_exists($path))
				unlink($path);			
		
		$noticia->delete();
		
		return redirect('noticias')->with('message', 'Se eliminó la noticia correctamente.');
	}
	
	
// 	private function almacenarArchivo(File $archivo){
// 		return Storage::putFile('public/noticias', $archivo);
// 	}
	

}
