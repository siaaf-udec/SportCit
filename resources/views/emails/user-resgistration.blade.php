@component('mail::message')
Hola, {{ $user->name }}, bienvenido a SportCit

Espero que te guste nuestra plataforma

@component('mail::button', ['url' => ''])
Ver Opiniones
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
