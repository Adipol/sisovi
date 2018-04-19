<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusStoreRequest;
use App\Http\Requests\BusUpdateRequest;

use App\Bus;
use App\Patio;

class BusController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
    public function index(){
		$buses=Bus::withTrashed()->orderBy('code','ASC')->with('patio')->paginate(10);
		return view('admin.buses.index')->with(compact('buses'));
	}

	public function create(){
		$patios=Patio::all();
		return view('admin.buses.create')->with(compact('patios'));
	}

	public function store(BusStoreRequest $request){
		$bus=new Bus();
		$bus->code=$request->input('code');
		$bus->license_plate=$request->input('license_plate');
		$bus->patio_id=$request->input('patio_id')?: null;
		$ucm=auth()->user();
		$bus->ucm=$ucm->id;
		$bus->save();
		
		return redirect()->route('buses.index')->with('notification','Bus ingresado exitosamente.');
	}

	public function edit($id){
		$bus=Bus::find($id);
		$patios=Patio::all();

		return view('admin.buses.edit')->with(compact('bus','patios'));
	}

	public function update(BusUpdateRequest $request, $id){
		$bus=Bus::find($id);
		$bus->code=$request->input('code');
		$bus->license_plate=$request->input('license_plate');
		$bus->patio_id=$request->input('patio_id')?: null;
		$ucm=auth()->user();
		$bus->ucm=$ucm->id;
		$bus->save();

		return redirect()->route('buses.index')->with('notification','Bus modificado exitosamente.');
	}

	public function delete($id){
		$bus=Bus::find($id);
		$bus->delete();

		return redirect()->route('buses.index')->with('notification','El bus se dio de baja correctamente');
	}

	public function restore($id){
		User::withTrashed()->find($id)->restore();
		return redirect()->route('buses.index')->with('notification','El bus se habilitó correctamente');
	}
}
