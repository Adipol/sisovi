<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonStoreRequest;
//use Illuminate\Http\Response;
use App\Person;

class PersonController extends Controller
{
	public function store(Request $request)
	{	
		$messages = [
			'name.required' => 'Necesita ingersar el nombre!',
		];

		$validator=\Validator::make($request->all(),[
			'name'=>'required',
			'firstName'=>'required',
			'LastName'=>'min:3',
			'identity_card'=>'required',
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

		return response()->json(['success'=>'Data is successfully added']);
	
	}
}
