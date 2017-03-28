<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OfertaLaboral as OfertaLaboral;
use App\User as User;
class OfertasController extends Controller
{
public function index(){
	$trabajos = OfertaLaboral::all();
	return view('listTrabajos', compact('trabajos'));
	
}
	
public function create(){
	return \View::make('prueba');
}
public function guardar(Request $request){
	$ofertaLaboral = new OfertaLaboral;
	
	$ofertaLaboral->titulo = $request->titulo;
	$ofertaLaboral->texto = $request->texto;
	$ofertaLaboral->idUsuarioCreacion = $request->user()->id;
	
	
	$ofertaLaboral->save();
	
	redirect('prueba');
}

}

