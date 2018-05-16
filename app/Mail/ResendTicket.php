<?php

namespace App\Mail;

use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResendTicket extends Mailable
{
    use Queueable, SerializesModels;

	private $ticket;
	private $solicitante_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket,$solicitante_name)
    {
		$this->ticket = $ticket;
		$this->solicitante_name=$solicitante_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return  $this
		->subject(__("Reenvio solicitud de video"))
		->markdown('emails.resend_ticket')
		->with('ticket', $this->ticket)
		->with('solicitante', $this->solicitante_name);
    }
}
