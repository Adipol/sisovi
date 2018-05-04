@component('mail::message')
# {{ __("Nueva solicitud!") }}

{{ __("El estudiante :solicitante se ha inscrito en tu curso :ticket, FELICIDADES", ['ticket' => $ticket->id]) }}


@component('mail::button', ['url' => url('/tickets/' . $ticket->id . '/editar'), 'color' => 'red'])
    {{ __("Ir al curso") }}
@endcomponent

{{ __("Gracias") }},<br>
{{ config('app.name') }}

@endcomponent