<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Empresa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$user = \Auth::user();
    	
    	if($user->userable_type = 'App\Persona'){
    		$relacion = Persona::find($user->userable_id);
    	}else{
    		$relacion = Empresa::find($user->userable_id);		
    	}
    	    	
        return view('home', ['user'=>$user, 'relacion'=>$relacion]);
    }
}
