<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUser;

use App\User;
use App\Rol;

class UserController extends Controller
{
    public function index(){
		$users=User::withTrashed()->orderBy('name','ASC')->with('rol')->paginate(10);
		return view('admin.users.index')->with(compact('users'));
	}

	public function create(){
		$roles=Rol::all();
		return view('admin.users.create')->with(compact('roles'));
	}

	public function store(UserStoreRequest $request){
		
		$user = new User();
		$user->name=$request->input('name');
		$user->email=$request->input('email');
		$email=$request->input('email');
		$password=$request->input('password');
		
		if ($password)
			$user->password=bcrypt($password);
			$user->keyword=bcrypt($password);
		
		$user->rol_id=$request->input('rol_id')?: null;	
		$ucm=auth()->user();
		$user->ucm=$ucm->id;
		$user->save();

		Mail::to($email)->send(new NewUser($user));

		return redirect()->route('users.index')->with('notification','Usuario ingresado exitosamente.');
	}

	public function edit($id){
		$user=User::find($id); 
		$roles=Rol::all();
		
		return view('admin.users.edit')->with(compact('user','roles')); 
	}
	
	public function update(UserUpdateRequest $request,$id){
		$user=User::find($id);
		$user->name=$request->input('name');
		$user->email=$request->input('email');
		$user->rol_id=$request->input('rol_id')?: null;	
		$ucm=auth()->user();
		$user->ucm=$ucm->id;
		$user->save();

		return redirect()->route('users.index')->with('notification','Usuario modificado exitosamente');
	}

	public function delete($id){
		$user=User::find($id);
		$user->delete();

		return redirect()->route('users.index')->with('notification','El usuario se dio de baja correctamente');
	}

	public function restore($id){
		User::withTrashed()->find($id)->restore();
		return redirect()->route('users.index')->with('notification','El usuario se habilitó correctamente');
	}
}
