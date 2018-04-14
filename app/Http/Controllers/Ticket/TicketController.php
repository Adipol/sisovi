<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
use Illuminate\Support\Facades\Storage;
//use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Ticket;
use App\Level;
use App\Bus;
use App\Patio;
use App\Area;


class TicketController extends Controller
{
	 public function index(){

		$tickets=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','buses.patio_id','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id')
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id','tickets.code_area','levels.name as level_name','users.name as applicant_name','patios.name as patio_name','tickets.incident_date','codes.name as code_name','tickets.created_at','tickets.code_id')
		->paginate(10);

		return view('tickets.index')->with(compact('tickets')); 
	 }

	 public function create(){
		 $areas=Area::all();
		 $applicant=auth()->user();
		 $buses=Bus::all();
		 $patios=Patio::all();
		 $levels=Level::all();
		 
		 return view('tickets.create')->with(compact('areas','applicant','buses','patios','levels'));
	 }

	 public function store(TicketStoreRequest $request){
		 $ticket= new Ticket();

		 $ticket->applicant_id=auth()->user()->id;
		 $ticket->incident_date=$request->input('incident_date');
		 
		 $ticket->applicant_obs=$request->input('applicant_obs');
		 $ticket->patio=$request->input('patio');
		 $ticket->level_id=$request->input('level_id');
		 $ticket->bus_id=$request->input('bus_id');
		 $ticket->area=$request->input('area');
		 $var1=$request->input('area');

		 $vart=Ticket::where('area','=',$var1)->count();

		 $varto=$vart+1;
		 $vartrans=$var1.'-'.(string)$varto; 
		 $ticket->code_area=$vartrans;   

		 $ticket->driver=$request->input('driver');
		 $ticket->host=$request->input('host');
		 $ucm=auth()->user();
		 $ticket->ucm=$ucm->id;
		 $ticket->save();

		 return redirect()->route('tickets.index')->with('notification','Ticket ingresado exitosamente.');
	 }

	 public function edit($id){
		$ticket=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','buses.patio_id','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id') 
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id as idt','tickets.code_area','users.name as applicant_name','buses.code','patios.name as pname','tickets.driver','tickets.host','levels.name as lname','tickets.incident_date','tickets.applicant_obs')
		->where('tickets.id','=',$id)
		->first();
		//dd($ticket);
		return view('tickets.edit')->with(compact('ticket'));
	 }
	 public function update(TicketUpdateRequest $request, $id){
		$ticket=Ticket::find($id);

		//if($request->file('file')){
			$file=$request->file('file');
			//$path=Storage::disk('ftp')->put('videos',$request->file('file'));
			$path=Storage::disk('ftp')->put('videos', $file);
			//$path=Storage::disk('ftp')->put($file, fopen($request->file('file'), 'r+'));
			//dd ($path);
	 
			//$filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
			//dd ($filename);
			$ticket->file=$path;
		//}

		$ticket->operational_obs=$request->input('operational_obs');
		$ticket->save();

		return redirect()->route('tickets.index')->with('notification','archivo ingresado exitosamente.');
	 }
}