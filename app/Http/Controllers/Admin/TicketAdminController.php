<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Ticket;

class TicketAdminController extends Controller
{
    public function index(){
		$tickets=Ticket::with('bus.patio','level','code','user')->where('code_id',3)
		->paginate(15);

		return view('admin.tickets.index')->with(compact('tickets'));
	}

	public function deletefile($id){
		$ticket=Ticket::find($id);
		$file=$ticket->file;

		if(Storage::disk('ftp')->exists($file)){	
			$user=auth()->user()->id;
			$userName=auth()->user()->name;
			Storage::disk('ftp')->put($user. ''.time().'_' . $file, $userName);
			Storage::disk('ftp')->delete($file);
			$ticket->file='/';
			$ticket->save();

			return redirect()->route('atickets.index')->with('notification','Archivo de ticket eliminado.');
		}else{
			return back()->with('danger','Archivo no encontrado.');
		} 
	}
}
