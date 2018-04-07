<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	if (!\Auth::check())
    		return false;
    	
    	$user = \Auth::user();
    	
        return $user->hasAnyRole(['administrador', 'desarrollador']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    	/*
    	 * 		'titulo' => 'required|min:5|max:50',
        		'texto' => 'required|min:50|max:500',
        		'intro' => 'required|min:15|max:60',
        		'fechaAlta' => 'required|date_format:"d/m/Y"',
        		'urlArchivo' => 'file|max:5120',
        		
        		titulo',			
				'texto',
				'urlArchivo',
				'idUsuarioCreacion',
				'fechaAlta',
				'fechaBaja'
    	 */
    	
        return [
        		'titulo' => 'required|min:5|max:50',
        		'texto' => 'required|min:50|max:500',
        		'urlArchivo' => 'file|max:5120',
        ];
    }
}
