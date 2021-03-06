<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
		return (new MailMessage)
					->subject('Solicitud de reestablecimiento de contraseña')
					->greeting('Hola' . ' ' . $notifiable->name)
                    ->line('Recibes este correo porque se solicitó un reestablecimiento de contraseña para tu cuenta.')
                    ->action('Reestablecer contraseña', url(config('app.url').route('password.reset', $this->token, false)))
					->line('Si no realizaste esta peticion, puedes ignorar este correo y nada habrá cambiado.')
					->salutation('¡Saludos!');
    }
}
