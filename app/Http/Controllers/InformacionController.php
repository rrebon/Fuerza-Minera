<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informacion as Informacion;
use App\Http\Requests\InformacionRequest;
use Illuminate\Support\Facades\Storage as Storage;


class InformacionController extends Controller
{
	public function index(){
		$infos = Informacion::orderBy('fechaAlta','desc')->simplepaginate(3);
		return view('info.viewinfos', ['infos'=>$infos]);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('info.forms.createInfo');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(InformacionRequest $request)
	{
		$disk = Storage::disk();
	
		$path = "";
	
		$path = $request->urlArchivo->store('public/info');
	
		$input = $request->all();
		//hago la conversion de la fecha con el formato correspondiente
		$input['fechaAlta'] = date_create_from_format("d/m/Y", $input['fechaAlta']);
	
		$input['idUsuarioCreacion'] = \Auth::user()->id;
		$input['urlArchivo'] = $path;
		Informacion::create($input);
	
		return redirect('informacion');
	}
	
	public function show($idInfo){
		$info = Informacion::find($idInfo);
		return view('info.viewInfo', ['info'=>$info]);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($idInfo)
	{
		$info = Informacion::findOrFail($idInfo);
	
		return view('info.forms.infoEdit', compact('info'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(InformacionRequest $request, $idInfo)
	{
		$info = Informacion::findOrFail($idInfo);
		$input = $request->all();
		var_dump($input);
		$Info->update($input);
	
		return redirect('ofertaLaboral');
	}
	
	public function getDownload($idOferta)
	{
		$info = Informacion::findOrFail($idInfo);
	
		$file = Storage::disk()->get($info->urlArchivo);
	
		$mimeType = \Storage::mimeType($info->urlArchivo);
	
		$headers = array(
				'Content-Type: '.$mimeType,
		);
	
		$nombreArchivo = -$info->titulo.".pdf";
	
		return response()->download(storage_path('app/'.$info->urlArchivo),$nombreArchivo, $headers);
	}
}
