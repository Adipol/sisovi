@component('mail::message')
# {{ __("Reenvio de solicitud!") }}

{{ __("El usuario **:solicitante**, reenvia solicitud del **:bus** perteneciente al patio de operaciones **:patio**, con el código de ticket **:ticket_cod_area**.", ['solicitante'=>$solicitante, 'ticket_cod_area'=>$ticket->code_area,'bus'=>$ticket->bus->code,'patio'=>$ticket->bus->patio->name]) }}
<img class="img-responsive" src="{{ url('storage/sisovi/camaras.jpg') }}" alt="Sisovi">

@component('mail::button', ['url' => url('/tickets'), 'color' => 'blue'])
    {{ __("Ir a la solicitud") }}
@endcomponent

{{ __("Gracias") }}.

@endcomponent