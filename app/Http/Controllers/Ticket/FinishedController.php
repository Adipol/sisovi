<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;

class FinishedController extends Controller
{
    public function index(){
		$tickets=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','buses.patio_id','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id')
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id','tickets.code_area','levels.name as level_name','users.name as applicant_name','patios.name as patio_name','tickets.incident_date','codes.name as code_name','tickets.created_at','tickets.code_id','tickets.file')->where('tickets.code_id','=',3)
		->paginate(10);

		return view('tickets.finished.index')->with(compact('tickets'));
	}
}
