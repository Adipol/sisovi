<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonStoreRequest;
//use Illuminate\Http\Response;
use App\Person;
use Illuminate\View\View;
use Illuminate\Http\Response;

class PersonController extends Controller
{
	public function store(Request $request)
	{	
		$messages = [
			'firstName.required' => 'Es necesario ingresar el primer apellido.',
			'name.required' => 'Es necesario ingresar el nombre.',
			'identity_card.required' => 'Es necesario ingresar el numero  de carnet.',
			'issued.required' => 'Es necesario ingresar expedido.',
		];

		$validator=\Validator::make($request->all(),[
			'firstName'=>'required|min:3|max:20|',
			'name'=>'required|min:3|max:20|',
			'identity_card'=>'required|min:5|max:20|unique:people,identity_card',
			'issued'=>'required',
		],$messages);
		
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

		$person                = new Person();
		$person->firstName     = $request->get('firstName');
		$person->lastName      = $request->get('lastName');
		$person->name          = $request->get('name');
		$person->identity_card = $request->get('identity_card');
		$person->issued        = $request->get('issued');
		$ucm                   = auth()->user();
		$person->ucm           = $ucm->id;
		$person->save();

		return response()->json($person);
	}
}
