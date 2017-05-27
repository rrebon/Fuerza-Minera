<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\OfertaLaboralRequest as OfertaLaboralRequest;
use App\OfertaLaboral as OfertaLaboral;
use App\User as User;
use Illuminate\Support\Facades\Storage;

class OfertasController extends Controller
{
public function index(){
	$trabajos = OfertaLaboral::simplepaginate(3);
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
	$archivo = $request->file('urlArchivo');
	$path = "";
	if($archivo)
		$path = $archivo->store('public/ofertasLaborales');
	
	$input = $request->all();
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
public function edit($id)
{
	$oferta = OfertaLaboral::findOrFail($id);

	return view('oferta.forms.ofertaLaboralEdit', compact('oferta'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
	$oferta = OfertaLaboral::findOrFail($id);	
	$input = $request->all();
	var_dump($input);
	$oferta->update($input);

	return redirect('ofertaLaboral');
}


}

