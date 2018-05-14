<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonStoreRequest;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;

use App\Person;

class PersonController extends Controller
{
    public function store(Request $request){
		
		$validator=\Validator::make($request->all(),[
			'name'          => 'required',
			'firstName'     => 'required',
			'lastName'      => 'required',
			'identity_card' => 'required',
			'issued'        => 'required'
		]);
        
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
