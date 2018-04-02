<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;


use App\User;
use App\Rol;

class UserController extends Controller
{
    public function index(){
		$users=User::all();
		$roles=Rol::all();
		
		return view('admin.users.index')->with(compact('users','roles'));
	}

	public function create(){
		$roles=Rol::all();
		return view('admin.users.create')->with(compact('roles'));
	}

	public function store(UserStoreRequest $request){
		
		$this->validate(User::$messages);

		$user = new User();
		$user->name=$request->input('name');
		$user->email=$request->input('email');
		$password=$request->input('password');
		
		if ($password)
			$user->password=bcrypt($password);
			$user->keyword=bcrypt($password);
		
		$user->rol_id=$request->input('rol_id')?: null;	
		$ucm=auth()->user();
		$user->ucm=$ucm->id;
		
		$user->save();

		return back();
	}
}
