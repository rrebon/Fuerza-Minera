<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Noticia as Noticia;
use App\User as User;

class NoticiasController extends Controller
{
    public function index(){
    	$noticias = Noticia::simplepaginate(10);
    	return view('noticia.viewNoticias', ['noticias'=>$noticias]);
	}
	
	public function show($idNoticia){
		$noticia = Noticia::find($idNoticia);
		return view('noticia.viewNoticia', ['noticia'=>$noticia]);
	}
	
	
	
}
