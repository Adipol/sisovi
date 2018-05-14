<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonStoreRequest;
use Validator;
use Illuminate\Support\Facades\Input;
//use Illuminate\Http\Response;

use Response;
use App\Person;

class PersonController extends Controller
{
    public function store(Request $request){
		
		$validator=Validator::make($request->all(),[
			'name'          => 'required',
			'firstName'     => 'required',
			'lastName'      => 'required',
			'identity_card' => 'required',
			'issued'        => 'required'
		]);
		
		$input=$request->all();

       if($validator->passes()){
		$person                = new Person();
		$person->firstName     = $request->get('firstName');
		$person->lastName      = $request->get('lastName');
		$person->name          = $request->get('name');
		$person->identity_card = $request->get('identity_card');
		$person->issued        = $request->get('issued');
		$ucm                   = auth()->user();
		$person->ucm           = $ucm->id;
		$person->save();
		
		return Response::json(['success'=>'1']);
		//return $this->response('Lesson created successfully');
	   }
	   return Response::json(['erros'=>$validator->errors()]);
		

	
	}
}
