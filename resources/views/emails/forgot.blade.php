@component('mail::message')
hello <h2>{{$user->name}}</h2>
{{-- Header --}}

@component('mail::button', ['url' => url('reset-password/' . $user->remember_token)])
reset password
{{ config('app.name') }}
@endcomponent
