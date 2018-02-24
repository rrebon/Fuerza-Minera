<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
	protected $table = 'informaciones';
	protected $primaryKey = 'idInfo';
	
	//ya las cree sin renombrar estos campos
	//     const CREATED_AT = 'fechaCreacion';
	//     const UPDATED_AT = 'fechaModificacion';
	
	
	protected $fillable = array('titulo',			
			'texto',
			'urlArchivo',
			'idUsuarioCreacion',
			'fechaAlta',
			'fechaBaja'
	);
	
	public function usuarioCreacion(){
		return $this->hasOne('App\User', 'id', 'idUsuarioCreacion');
	}
}
