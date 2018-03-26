<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Noticiarequest extends FormRequest{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array	 
	 */
	public function rules()
	{
		return [
				'titulo' => 'required|min:5|max:50',
				'intro' => 'required|min:5|max:200',
				'texto' => 'required|min:50|max:3500',
				'intro' => 'required|min:15|max:60',
				'fechaAlta' => 'required|date_format:"d/m/Y"',
				'urlImagenIntro' => 'file|max:5120',
		];
	}
	
	public function withValidator($validator)
	{		
		$validator->after(function ($validator) {
			if($this->hasFile('urlImagenIntro')){		
				if(!$this->file('urlImagenIntro')->isValid()){
					$validator->errors()->add('urlImagenIntro', "No se guardó correctamente el archivo de imagen intro." );
				}
			}else{
				$validator->errors()->add('urlImagenIntro', "No ingresó archivo de imagen intro." );
			}
		});
	}
	
}