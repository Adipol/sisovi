<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaStoreRequest;
use App\Http\Requests\AreaUpdateRequest;
use Illuminate\Http\RedirectResponse;

use App\Area;
use App\User;

class AreaController extends Controller
{
    public function index(){
		$areas=Area::withTrashed()->orderBy('name','ASC')->paginate(10);
		return view('admin.areas.index')->with(compact('areas'));
	}

	public function create(){
		return view('admin.areas.create');
	}

	public function store(AreaStoreRequest $request){
		$area = new Area();
		$area->name=$request->input('name');
		$area->abreviation=$request->input('abreviation');
		$ucm=auth()->user();
		$area->ucm=$ucm->id;
		$area->save();

		return redirect()->route('areas.index')->with('notification','Área ingresada exitosamente.');
	}

	public function edit($id){
		$area=Area::find($id);
		return view('admin.areas.edit')->with(compact('area'));
	}

	public function update(AreaUpdateRequest $request,$id){
		$area=Area::find($id);
		$area->name=$request->input('name');
		$area->abreviation=$request->input('abreviation');
		$ucm=auth()->user();
		$area->ucm=$ucm->id;
		$area->save();

		return redirect()->route('areas.index')->with('notification','Área modificada exitosamente.');
	}

	public function delete($id){
		$area=Area::find($id);
		$area->delete();

		return redirect()->route('areas.index')->with('notification','El área se dio de baja correctamente.');
	}

	public function restore($id){
		Area::withTrashed()->find($id)->restore();
		return redirect()->route('areas.index')->with('notification','El área se habilitó correctamente.');
	}

}
