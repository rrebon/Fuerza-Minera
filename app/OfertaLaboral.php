<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;


class OfertaLaboral extends Model
{
    protected $table = 'OfertasLaborales';
    
    const CREATED_AT = 'fechaCreacion';
    const UPDATED_AT = 'fechaModificacion';
    
    protected $fillable = array('titulo',    		
    							'texto',
    							'idUsuarioCreacion',
    							'idUsuarioPublicacion',
    							'fechaAlta',
    							'fechaBaja'
    );
    
    public function usuarioCreacion(){
    	return $this->hasOne('App\User', 'id', 'idUsuarioCreacion');
    }
    
    public function  usuarioPublicacion(){
    	return $this->hasOne('App\User','id', 'idUsuarioPublicacion');
    }   
    
}
