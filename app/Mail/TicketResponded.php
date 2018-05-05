<?php

namespace App\Mail;

use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketResponded extends Mailable
{
    use Queueable, SerializesModels;

	private $ticket;
	private $operational_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket,$operational_name)
    {
		$this->ticket = $ticket;
		$this->operational_name=$operational_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return  $this
		->subject(__("Ticket de solicitud respondido"))
		->markdown('emails.responded_ticket')
		->with('ticket', $this->ticket)
		->with('operational', $this->operational_name);
    }
}
