<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Noticia extends Model
{
	protected $table = 'Noticias';
	
    const CREATED_AT = 'fechaCreacion';
    const UPDATED_AT = 'fechaModificacion';
    
    protected $fillable = array('titulo',
    							'intro',
    							'texto',
    							'idUsuarioCreacion',
    							'urlImagenIntro',
    							'urlCarpetaImagenes',
    							'fechaAlta',
    							'fechaBaja'
    							);
    
    public function usuarioCreacion(){
    	return $this->hasOne('App\User', 'id', 'idUsuarioCreacion');
    }
}
