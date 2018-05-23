<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
				'name' => 'required|min:3|max:20|unique:users,name',
				'email' => 'required|string|email|max:30|unique:users,email',
				'password' => 'min:6',
				'rol_id'=>'required'		
		];
	}
		
	public function messages(){
		return [
			'name.required'=>'Es necesario ingresar el nombre del usuario.',
			'name.unique'=>'El nombre de usuario existe.',
			'name.max'=>'El nombre es demasiado extenso.',
			'name.min'=>'El nombre es demasiado reducido.',
			'email.required'=>'Es necesario ingresar el correo electronico.',
			'email.email'=>'Ingrese un correo electronico valido.',
			'email.unique'=>'Correo electronico existente.',
			'password.min'=>'La contraseña debe presentar al menos 6 caracteres.',
			'rol_id.required'=>'Es necesario seleccionar un rol.'
            ];
		} 
}
