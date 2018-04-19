<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatioStoreRequest;
use App\Http\Requests\PatioUpdateRequest;

use App\Patio;

class PatioController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
		$patios=Patio::withTrashed()->orderBy('name','ASC')->paginate(10);
		return view('admin.patios.index')->with(compact('patios'));
	} 

	public function create(){
		return view ('admin.patios.create');
	} 

	public function store(PatioStoreRequest $request){
		$patio =new Patio();
		$patio->name=$request->input('name');
		$patio->abreviation=$request->input('abreviation');
		$ucm=auth()->user();
		$patio->ucm=$ucm->id;
		$patio->save();

		return redirect()->route('patios.index')->with('notification','Patio ingresado exitosamente.');	
	}

	public function edit($id){
		$patio=Patio::find($id);
		return view('admin.patios.edit')->with(compact('patio'));
	}

	public function update(PatioUpdateRequest $request,$id){
		$patio=Patio::find($id);
		$patio->name=$request->input('name');
		$patio->abreviation=$request->input('abreviation');
		$ucm=auth()->user();
		$patio->ucm=$ucm->id;
		$patio->save();

		return redirect()->route('patios.index')->with('notification','Patio modificado exitosamente.');
	}

	public function delete($id){
		$patio=Patio::find($id);
		$patio->delete();

		return redirect()->route('patios.index')->with('notification','El patio se dio de baja correctamente.');
	}

	public function restore($id){
		Patio::withTrashed()->find($id)->restore();
		return redirect()->route('patios.index')->with('notification','El patio se habilitó correctamente.');
	}
}
