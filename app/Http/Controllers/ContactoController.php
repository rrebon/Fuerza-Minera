<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contacto;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
    	return view('contacto');
	}
	
	public function consultar(Request $request){	
		$mensaje = $request->mensaje;
		if(\Auth::check()){
			$user = \Auth::user();
			\Mail::to('fuerzaminera@fuerzaminera.com.ar')->send(new Contacto($mensaje, $user));
			
			$failures = \Mail::failures();
			if($failures){
				return redirect('contacto')->with(['error' => 'Su mensaje no ha sido enviado.', 'failures'=>$failures]);
			}else{
				return redirect('contacto')->with('message', 'Su mensaje ha sido enviado, será respondido en la brevedad. Gracias!!');
			}
		}else{
			return redirect('contacto')->with('error', 'Debe estar autenticado para poder enviar un mensaje');
		}
	}
}
