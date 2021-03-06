<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'operational_obs'=>'required|min:15',
			'file'=>'required|file|max:800000|mimes:rar,zip'
        ];
	}
	
	public  function messages(){
		return [
		 	'operational_obs.required'=>'Es necesario ingresar observaciones del incidente.',
			'operational_obs.min'=>'Observacion reducida.',
			'file.required'=>'Ingresar archivo.',
			'file.mimes'=>'El archivo debe tener extension rar,zip.'
		];
	}
}
