<?php

namespace App\Http\Controllers;


use App\Http\Requests\OfertaLaboralRequest as OfertaLaboralRequest;
use App\OfertaLaboral as OfertaLaboral;
use App\User as User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response as Response;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
public function index(){
	$trabajos = OfertaLaboral::orderBy('fechaAlta','desc')->simplepaginate(5);
	return view('oferta.viewTrabajos', ['trabajos'=>$trabajos]);	
}

public function indexFiltered($filtro){
	
// 	$trabajos = DB::table('OfertasLaborales')
// 				->where('titulo', 'like', '%'.$filtro.'%')
// 				-get();
	$trabajos = OfertaLaboral::orderBy('fechaAlta','desc')
				->where('titulo', 'like', '%'.$filtro.'%')
				->simplepaginate();
	
	return view('oferta.viewTrabajosFiltered', ['trabajos'=>$trabajos]);			
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
	return view('oferta.forms.createOfertaLaboral');
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(OfertaLaboralRequest $request)
{
	$disk = Storage::disk();
	
	$path = "";	
	var_dump($request->urlArchivo);
	exit();
	$path = $request->urlArchivo->store('public/ofertasLaborales');	
	
	$input = $request->all();	
	//hago la conversion de la fecha con el formato correspondiente
	$input['fechaAlta'] = date_create_from_format("d/m/Y", $input['fechaAlta']); 
	
	$input['idUsuarioCreacion'] = \Auth::user()->id;
	$input['urlArchivo'] = $path;
	OfertaLaboral::create($input);

	return redirect('ofertaLaboral');
}

public function show($idOferta){
	$oferta = OfertaLaboral::find($idOferta);
	return view('oferta.viewTrabajo', ['trabajo'=>$oferta]);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($idOferta)
{
	$ofertaLaboral= OfertaLaboral::findOrFail($idOferta);
		
	return view('oferta.forms.ofertaLaboralEdit', compact('ofertaLaboral'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update($idOferta, OfertaLaboralRequest $request)
{
	//TODO: se rompe si no se carga archivo para la modificacion. Ni siquiera llega al metodo.
	//$request = OfertaLaboralRequest::capture();
	
	$oferta = OfertaLaboral::findOrFail($idOferta);
	
	$input = $request->all();
			
	$disk = Storage::disk();
		
	$path = storage_path('app/'.$oferta->urlArchivo);
		
	//si el request tiene un archivo
	//borro el que tiene y seteo el nuevo
	if(isset($request->urlArchivo)){
		if(file_exists($path)){
			unlink($path);			
		}	
		$path = $request->urlArchivo->store('public/ofertasLaborales');
	}		
	//siempre asigno el path del archivo, ya sea el nuevo o el viejo
	$input['urlArchivo'] = $path;		
	
	$input = $request->all();
	//hago la conversion de la fecha con el formato correspondiente
	$input['fechaAlta'] = date_create_from_format("d/m/Y", $input['fechaAlta']);
		
	$oferta->titulo = $input['titulo'];
	$oferta->fechaAlta = $input['fechaAlta'];
	$oferta->intro = $input['intro'];
	$oferta->texto = $input['texto'];
	$oferta->urlArchivo = $path;
	
	$oferta->save();
	
	return redirect('ofertaLaboral');
	//$oferta->update($input);
	
	//return $this->show($idOferta);
}

public function destroy($idoferta){
	$oferta = OfertaLaboral::find($idoferta);
	
	$path = storage_path('app/'.$oferta->urlArchivo);
	if(file_exists($path)){
		unlink($path);
	}
	
	$oferta->delete();
	
	return redirect('ofertaLaboral')->with('message', 'Oferta Eliminada');
}

//TODO: ver porque queda cacheada en una pagina la direccion de descarga idOferta=11
public function getDownload($idOferta)
{
	$oferta = OfertaLaboral::findOrFail($idOferta);
	
	$file = Storage::disk()->get($oferta->urlArchivo);
	
	$path = storage_path('app/'.$oferta->urlArchivo);
	
	$mimeType = \Storage::mimeType($oferta->urlArchivo);
	
	$ext = pathinfo($path, PATHINFO_EXTENSION);	
	
	$headers = array(
			'Content-Type: '.$mimeType,
	);
	
	$nombreArchivo = $oferta->titulo.".".$ext;
	
	return response()->download($path,$nombreArchivo, $headers);
}


}

