<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\OfertaLaboral;

class OfertaLaboralRequest extends FormRequest
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
    		$oferta = OfertaLaboral::find($this->route('ofertaLaboral'));
    		if($oferta == null)
    			return true;
    		
        	return $user->hasAnyRole(['administrador', 'desarrollador']) || $user->id === $oferta->idUsuarioCreacion;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        		'titulo' => 'required|min:1|max:255',
        		'texto' => 'required|min:1|max:1024',
        		'intro' => 'required|min:1|max:255',
        		'fechaAlta' => 'required|date_format:"d/m/Y"',
        		'urlArchivo' => 'file|max:5120',
        ];
    }
    
    public function withValidator($validator)
    {
    	$validator->after(function ($validator) {
    		if($this->hasFile('urlArchivo')){
    			if(!$this->file('urlArchivo')->isValid()){
    				$validator->errors()->add('urlArchivo', "No se guardó correctamente el archivo." );
    			}
    		}else{
    			$validator->errors()->add('urlArchivo', "No ingresó archivo." );
    		}
    	});
    }
}
