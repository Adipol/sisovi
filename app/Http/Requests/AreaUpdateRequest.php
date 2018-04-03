<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			 'name'=>'required|min:3|max:255|unique:areas,name,'.$this->id,
			 'abreviation'=>'required|min:1|max:150|unique:areas,abreviation,'.$this->id
        ];
	}
	
	public function messages(){
		return [
			'name.required'=>'Es necesario ingresa el nombre de la área.',
			'name.min'=>'El nombre es demasiado reducido.',
			'name.max'=>'El nombre se demasiado extenso.',
			'name.unique'=>'El nombre del área existe.',
			'abreviation.required'=>'Es necesario ingresar la abreviación.',
			'abreviation.min'=>'La abreviación es demasiado reducido.',
			'abreviation.max'=>'La abreviación es demasiado extenso.',
			'abreviation.unique'=>'El nombre de la abreviación existe.'
		];
	}
}
