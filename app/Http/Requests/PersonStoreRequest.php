<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonStoreRequest extends FormRequest
{
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
			'name'=>'required|min:3|max:100',
			'firstName'=>'required|min:3|max:100',
			'LastName'=>'min:3|max:100',
			'identity_card'=>'required|numeric|min:5|max:20|unique:people,identity_card',
			'issued'=>'required|min:3|max:4'
        ];
    }
}
