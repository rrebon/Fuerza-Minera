<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\OfertaLaboralRequest as OfertaLaboralRequest;
use App\OfertaLaboral as OfertaLaboral;
use App\User as User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response as Response;

class OfertasController extends Controller
{
public function index(){
	$trabajos = OfertaLaboral::orderBy('fechaAlta','desc')->simplepaginate(3);
	return view('oferta.viewTrabajos', ['trabajos'=>$trabajos]);	
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
	$ofertaLaboral = OfertaLaboral::findOrFail($idOferta);

	return view('oferta.forms.ofertaLaboralEdit', compact('ofertaLaboral'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update($id, OfertaLaboralRequest $request)
{
	$oferta = OfertaLaboral::findOrFail($id);
	$input = $request->all();
	var_dump($input);
	$oferta->update($input);

	return redirect('ofertaLaboral');
}

public function getDownload($idOferta)
{
	$oferta = OfertaLaboral::findOrFail($idOferta);
	
	$file = Storage::disk()->get($oferta->urlArchivo);
	
	$mimeType = \Storage::mimeType($oferta->urlArchivo);	
	
	$headers = array(
			'Content-Type: '.$mimeType,
	);
	
	$nombreArchivo = "OfertaLaboral-".$oferta->id.".pdf";	
	
	return response()->download(storage_path('app/'.$oferta->urlArchivo),$nombreArchivo, $headers);
}


}

