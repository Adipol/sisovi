<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'code'=>'required|min:4|max:50|unique:buses,code,'.$this->id,
			'license_plate'=>'required|min:5|max:50|unique:buses,license_plate,'.$this->id,
			'patio_id'=>'required',
		];
	}

	public function messages(){
		return [
			'code.required'=>'Es necesario ingresar un código.',
			'code.min'=>'El código es demasiado reducido.',
			'code.max'=>'El código es demasiado extenso.',
			'code.unique'=>'Código existente.',
			'license_plate.required'=>'Es necesario ingresar la placa.',
			'license_plate.min'=>'La placa es demasiado reducido.',
			'license_plate.max'=>'La placa es demasiado extenso.',
			'license_plate.unique'=>'El nombre de la placa existe.',
			'patio_id.required'=>'Es necesario seleccionar un patio.'
		];
	}
}
