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
use App\Person;

class TicketController extends Controller
{
	 public function index(){

		$tickets=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','tickets.patio','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id')
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id','tickets.code_area','levels.name as level_name','users.name as applicant_name','patios.name as patio_name','tickets.incident_date','tickets.created_at','codes.name as code_name','tickets.code_id','tickets.file')
		->where('tickets.code_id','<>',3)
		->paginate(15);

		return view('tickets.index')->with(compact('tickets'));
	 }

	 public function create(){
		 $areas     = Area::pluck('name','id');
		 $applicant = auth()->user();
		 $buses     = Bus::pluck('code','id');
		 $patios    = Patio::pluck('name','id');
		 $levels    = Level::pluck('name','id');
		 $people    = Person::orderBy('firstName')->get(); 
		 
		 return view('tickets.create')->with(compact('areas','applicant','buses','patios','levels','people'));
	 }

	 public function store(TicketStoreRequest $request){
		 $ticket       = new Ticket();
		 $operationals = User::where('rol_id','=',3)->pluck('email');
		
		 $ticket->applicant_id  = auth()->user()->id;
		 $ticket->incident_date = $request->input('incident_date');
		 
		 $ticket->applicant_obs = $request->input('applicant_obs');
		 $ticket->patio         = $request->input('patio_id');
		 $ticket->level_id      = $request->input('level_id');
		 $ticket->bus_id        = $request->input('bus_id');
		 $ticket->area_id       = $request->input('area_id');
		 $var1                  = $request->input('area_id');

		 $vart=Ticket::where('area_id','=',$var1)->count();

		 $varto=$vart+1;
		 $area_abre=Area::find($var1);
		 
		 $vartrans=$area_abre->abreviation . '-' . (string)$varto; 
		 $ticket->code_area=$vartrans;   

		 $ticket->driver_id=$request->input('driver_id');
		 $ticket->host_id=$request->input('host_id');
		 $ucm=auth()->user();
				 
		 $ticket->ucm=$ucm->id;
		 $ticket->save();
		 
		 try{
			foreach($operationals as $operational){
				Mail::to($operational)->send(new NewTicket($ticket, auth()->user()->name));
			 }
		 }catch (\Exception $exception) {
	    	$exception->getMessage();
		 }

		 return redirect()->route('tickets.index')->with('notification','Ticket ingresado exitosamente.');
	 }

	 public function show($id){
		$ticket=Ticket::find($id);
		$patio_id=$ticket->patio;
		$driver_id=$ticket->driver_id;
		$host_id=$ticket->host_id;
	
		$patio=Patio::find($patio_id);	
		$driver=Person::find($driver_id);
		$host=Person::find($host_id);
	
		return view('tickets.show')->with(compact('ticket','patio','driver','host'));
	 }

	 public function edit($id){
		$ticket=Ticket::where('id',$id)->with('bus','level','code','user')->where('code_id','<>',3)->first();
		$patio_id=$ticket->patio;
		$patio=Patio::where('id',$patio_id)->first();
	
		return view('tickets.edit')->with(compact('ticket','patio'));
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
			try{
				Mail::to($applicant_email)->send(new TicketResponded($ticket, auth()->user()->name));
			}catch (\Exception $exception) {
	    	$exception->getMessage();
		 }

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
			Storage::disk('ftp')->delete($file);
			$ticket->code_id=4;
			$ticket->file='/';
			$ticket->operational_obs='';
			$ticket->save();
			
			try{
				foreach($operationals as $operational){
				Mail::to($operational)->send(new ResendTicket($ticket, auth()->user()->name));
				} 
			}catch (\Exception $exception) {
				$exception->getMessage();
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

	 public function indexfinished(){
		$tickets=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','tickets.patio','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id')
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id','tickets.code_area','levels.name as level_name','users.name as applicant_name','patios.name as patio_name','tickets.incident_date','tickets.created_at','codes.name as code_name','tickets.code_id','tickets.file')
		->where('tickets.code_id',3)
		->paginate(15);

		return view('tickets.finished.index')->with(compact('tickets'));
	}

	public function showf($id){
		$ticket=Ticket::find($id);
		$patio_id=$ticket->patio;
		$driver_id=$ticket->driver_id;
		$host_id=$ticket->host_id;
	
		$patio=Patio::find($patio_id);	
		$driver=Person::find($driver_id);
		$host=Person::find($host_id);
	
		return view('tickets.finished.show')->with(compact('ticket','patio','driver','host'));
	 }
}
