<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;

class TicketAdminController extends Controller
{
    public function index(){
		$tickets=Ticket::with('bus.patio','level','code','user')->where('code_id',3)
		->paginate(15);

		return view('admin.tickets.index')->with(compact('tickets'));
	}
}
