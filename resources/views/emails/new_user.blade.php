@component('mail::message')
# {{ __("Ingreso al sistema!") }}

{{ __("Usted cuenta con acceso al sistema, su usuario es **:name** y su contraseña el numero de su carnet de identidad solo numeral, el correo electronico asociado a su cuenta es **:email**.", ['name'=>$user->name, 'email'=>$user->email]) }}
<img class="img-responsive" src="{{ url('storage/sisovi/camaras.jpg') }}" alt="Sisovi">

@component('mail::button', ['url' => url('/tickets'), 'color' => 'blue'])
    {{ __("Ingresar al sistema") }}
@endcomponent

{{ __("Gracias") }}.

@endcomponent