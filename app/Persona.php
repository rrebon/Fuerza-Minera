<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = array('nombre',
    							'apellido',
    							'telefono'    							
    						);
    
    public function user(){ 
    	return morphOne('App\User', 'userable');
    }
}
