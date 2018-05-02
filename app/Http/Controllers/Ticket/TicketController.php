<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Ticket;
use App\Level;
use App\Bus;
use App\Patio;
use App\Area;


class TicketController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
	}
	
	 public function index(){
		$tickets=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','buses.patio_id','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id')
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id','tickets.code_area','levels.name as level_name','users.name as applicant_name','patios.name as patio_name','tickets.incident_date','codes.name as code_name','tickets.created_at','tickets.code_id','tickets.file')
		->paginate(10);
	
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

		 return redirect()->route('tickets.index')->with('notification','Ticket ingresado exitosamente.');
	 }

	 public function show($id){
		$ticket=Ticket::join('buses','tickets.bus_id','=','buses.id')
		->join('patios','buses.patio_id','=','patios.id')
		->join('levels','tickets.level_id','=','levels.id')
		->join('codes','tickets.code_id','=','codes.id') 
		->join('users','tickets.applicant_id','=','users.id')
		->select('tickets.id as idt','tickets.code_area','users.name as applicant_name','buses.code','patios.name as pname','tickets.driver','tickets.host','levels.name as lname','tickets.incident_date','tickets.applicant_obs')
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
		->select('tickets.id as idt','tickets.code_area','users.name as applicant_name','buses.code','patios.name as pname','tickets.driver','tickets.host','levels.name as lname','tickets.incident_date','tickets.applicant_obs','tickets.operational_obs')
		->where('tickets.id','=',$id)
		->first();

		return view('tickets.edit')->with(compact('ticket'));
	 }

	 public function update(TicketUpdateRequest $request, $id){
		
			$ticket=Ticket::find($id);
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

		return redirect()->route('tickets.index')->with('notification','archivo ingresado exitosamente.');
	 }

	 public function download(Request $request, $file){
	 try {
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
		} catch (\Exception $exception) {
	    	$error = $exception->getMessage();
	    	return back()->with('danger','Archivo no encontrado.');
	    }
	 } 
}
