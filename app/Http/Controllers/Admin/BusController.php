<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Bus;
use App\Patio;

class BusController extends Controller
{
    public function index(){
		$buses=Bus::withTrashed()->orderBy('code','ASC')->with('patio')->paginate(10);
		return view('admin.buses.index')->with(compact('buses'));
	}

}
