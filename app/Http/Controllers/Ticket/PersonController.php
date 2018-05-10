<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;

class PersonController extends Controller
{
    public function store(Request $request){
		$person = new Person();
		$person->firstName=$request->input('firstName');
		$person->lastName=$request->input('lastName');
		$person->name=$request->input('name');
		$person->identity_card=$request->input('identity_card');
		$person->issued=$request->input('issued');
		$ucm=auth()->user();	 
		$person->ucm=$ucm->id;
		$person->save();

		return back();  
	}
}
