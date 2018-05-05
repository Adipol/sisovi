<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\NewTicket;
use App\Mail\TicketResponded;
use App\Mail\ResendTicket;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Mail;
use App\Ticket;
use App\Level;
use App\Bus;
use App\Patio;
use App\Area;
use App\User;

class TicketController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
	}
	
	 public function index(){
		$tickets=Ticket::with('bus.patio','level','code')->get();
		dd ($tickets);

/* 		$tickets=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','buses.patio_id','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id')
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id','tickets.code_area','levels.name as level_name','users.name as applicant_name','patios.name as patio_name','tickets.incident_date','codes.name as code_name','tickets.created_at','tickets.code_id','tickets.file')
		->paginate(10); */
	
		return view('tickets.index')->with(compact('tickets')); 
	 }

	 public function create(){
		 $areas=Area::pluck('name','abreviation');
		 $applicant=auth()->user();
		 $buses=Bus::pluck('code','id');
		 $patios=Patio::pluck('name','id');
		 $levels=Level::pluck('name','id');
		 
		 return view('tickets.create')->with(compact('areas','applicant','buses','patios','levels'));
	 }

	 public function store(TicketStoreRequest $request){
		 $ticket= new Ticket();
		 $operationals=User::where('rol_id','=',3)->pluck('email');
		
		 $ticket->applicant_id=auth()->user()->id;
		 $ticket->incident_date=$request->input('incident_date');
		 
		 $ticket->applicant_obs=$request->input('applicant_obs');
		 $ticket->patio=$request->input('patio_id');
		 $ticket->level_id=$request->input('level_id');
		 $ticket->bus_id=$request->input('bus_id');
		 $ticket->area=$request->input('area_id');
		 $var1=$request->input('area_id');

		 $vart=Ticket::where('area','=',$var1)->count();

		 $varto=$vart+1;
		 $vartrans=$var1.'-'.(string)$varto; 
		 $ticket->code_area=$vartrans;   

		 $ticket->driver=$request->input('driver');
		 $ticket->host=$request->input('host');
		 $ucm=auth()->user();
				 
		 $ticket->ucm=$ucm->id;
		 $ticket->save();
		 
		 foreach($operationals as $operational){
			Mail::to($operational)->send(new NewTicket($ticket, auth()->user()->name));
		 } 
		
		 return redirect()->route('tickets.index')->with('notification','Ticket ingresado exitosamente.');
	 }

	 public function show($id){
		$ticket=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','buses.patio_id','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id') 
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id as idt','tickets.code_area','users.name as applicant_name','buses.code','patios.name as pname','tickets.driver','tickets.host','levels.name as lname','tickets.incident_date','tickets.applicant_obs','tickets.file')
		->where('tickets.id','=',$id)
		->first();

		return view('tickets.show')->with(compact('ticket'));
	 }

	 public function edit($id){
		$ticket=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','buses.patio_id','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id') 
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id as idt','tickets.code_area','users.name as applicant_name','buses.code','patios.name as pname','tickets.driver','tickets.host','levels.name as lname','tickets.incident_date','tickets.applicant_obs','tickets.operational_obs','tickets.applicant_id')
		->where('tickets.id','=',$id)
		->first();

		return view('tickets.edit')->with(compact('ticket'));
	 }

	 public function update(TicketUpdateRequest $request, $id){
		
			$ticket=Ticket::find($id);
			$applicant_id=$request->input('applicant_id');
			$applicant_email=User::where('id',$applicant_id)->pluck('email')->first();
			$cod_name=$request->input('cod_name');
			if($request->hasFile('file')){
					$file=$request->file('file');
					$filenamewithextension = $request->file('file')->getClientOriginalName();
					$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
					$extension = $request->file('file')->getClientOriginalExtension();
					$filenametostore = $cod_name .'_'.time().'.'. $extension;
					Storage::disk('ftp')->put($filenametostore, fopen($request->file('file'), 'r+'));
					$ticket->file=$filenametostore;
					$ticket->code_id=2;
					$ticket->operational_obs=$request->input('operational_obs');
					$ticket->save();
			}

			Mail::to($applicant_email)->send(new TicketResponded($ticket, auth()->user()->name));

		return redirect()->route('tickets.index')->with('notification','archivo ingresado exitosamente.');
	 }

	 public function download(Request $request, $file){
		if (Storage::disk('ftp')->exists($file))
		{
		$fileName = basename($file);
		$ftp = Storage::createFtpDriver([
                        'host'     => '192.168.1.2',
                        'username' => 'noenjaulado',
                        'password' => '123456',
						'port'     => '21',
						'timeout'  => '30', 
                         
		  ]);
			
		$filecontent = $ftp->get($file); // read file content 
		return Response::make($filecontent, '200', array(
			   'Content-Type' => 'application/octet-stream',
			   'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
		   ));
		}
		else{
			return back()->with('danger','Archivo no encontrado.');
		}
	 }
	 
	 public function restore(Request $request, $file){
		$operationals=User::where('rol_id','=',3)->pluck('email');
		
		if(Storage::disk('ftp')->exists($file)){
			$ticket=Ticket::where('file','=',$file)->first();			
			$user=auth()->user()->id;
			$userName=auth()->user()->name;
			Storage::disk('ftp')->put($user. ''.time().'_' . $file, $userName);
			$ticket->code_id=4;
			$ticket->file='/';
			$ticket->save();
	
			foreach($operationals as $operational){
				Mail::to($operational)->send(new ResendTicket($ticket, auth()->user()->name));
			} 

			return redirect()->route('tickets.index')->with('notification','Ticket reenviado exitosamente.');
		}else{
			return back()->with('danger','Archivo no encontrado.');
		} 
	 }

	 public function finished(Request $request, $id){
		$ticket=Ticket::find($id);
		$ticket->code_id=3;
		$ticket->ucm=auth()->user()->id;
		$ticket->save();

		return redirect()->route('tickets.index')->with('notification','Ticket finalizado.');

	 }
}
