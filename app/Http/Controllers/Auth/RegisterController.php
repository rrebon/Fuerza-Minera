<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Persona;
use App\Empresa;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    
    public function index(){    	
    	 return view('auth.Registro');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
    	$relacion;
    	
    	if (array_key_exists('razonSocial', $data)){
    			$relacion = Empresa::create([
    							'razonSocial' => $data['razonSocial'],
    							'telefono' => $data['telefono'],
    							'telefono2' => $data['telefono2'],
    							'direccion' => $data['direccion'],
    							'localidad' => $data['localidad']
    						]);
    	}else{
    		$relacion=Persona::create([
	    				'nombre' => $data['nombre'],
	    				'apellido' => $data['apellido'],
	    				'telefono' => $data['telefono']
	    		]);
	    	}
	    
	    $usuario = new User([
       				'name' => $data['name'],
            		'email' => $data['email'],
            		'password' => bcrypt($data['password']),
        			]);
// 	    El User::create() genera el usuario y lo persiste en la BD
// 	    $usuario = User::create([
//        				'name' => $data['name'],
//             		'email' => $data['email'],
//             		'password' => bcrypt($data['password']),
//         			]);
		
	    //guardo el usuario junto con la relacion
	    $usuario->userable()->associate($relacion);
	    $usuario->save();
        return $usuario;
    }
    
    public function actualizarSatus($status){   
    	session_start();
    	if((null==session('comboId'))){
    		session(['comboId' => 'nada']);    		
    	}else{
    		session(['comboId' => $status]);
    	}
    }
    
}
