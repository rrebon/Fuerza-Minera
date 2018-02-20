<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Empresa extends Model
{
	//protected $table = 'empresas';
    protected $fillable = array(
    							'razonSocial',
    							'telefono',
    							'telefono2',
    							'direccion',
    							'localidad'
    							);
    public function user(){
    	return morphOne('App\User', 'userable');
    }
}
