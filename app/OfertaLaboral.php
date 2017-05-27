<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;


class OfertaLaboral extends Model
{
    protected $table = 'OfertasLaborales';
    protected $primaryKey = 'idOferta';
    
    protected $fillable = array('titulo',    		
    							'texto',
    							'intro',
    							'idUsuarioCreacion',
    							'idUsuarioPublicacion',
    							'fechaAlta',
    							'fechaBaja',
    							'urlArchivo'
    );
    
    public function usuarioCreacion(){
    	return $this->hasOne('App\User', 'id', 'idUsuarioCreacion');
    }
    
    public function  usuarioPublicacion(){
    	return $this->hasOne('App\User','id', 'idUsuarioPublicacion');
    } 
    
}
