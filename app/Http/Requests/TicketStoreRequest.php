<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TicketStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
	}
	
    public function rules()
    {
        return [
			'area_id'=>'required',
			'bus_id'=>'required',
			'patio_id'=>'required',
			'driver'=>'required|min:5',
			'host'=>'required|min:5',
			'level_id'=>'required',
			'incident_date'=>'required',
			'applicant_obs'=>'required|min:15',
        ];
	}
	
	public  function messages(){
		return [
			'area_id.required'=>'Es necesario seleccionar el area.',
			'bus_id.required'=>'Es necesario seleccionar el bus.',
			'patio_id.required'=>'Es necesario seleccionar el patio.',
			'driver.required'=>'Es necesario ingresar el nombre del conductor.',
			'driver.min'=>'El nombre del conductor es demasiado reducido.',
			'host.required'=>'El necesario ingresar el nombre del anfitrión.',
			'host.min'=>'el nombre del anfitrión es demasiado reducido.',
			'level_id.required'=>'Es necesario seleccionar el grado del incidente.',
		 	'incident_date.required'=>'Es necesario ingresar la fecha del incidente.',
			'incident_date.date'=>'Formato de dato incorrecto.',
			'applicant_obs.required'=>'Es necesario ingresar las observaciones.',
			'applicant_obs.min'=>'La observación demasiado reducido.'
		];
	}
}
