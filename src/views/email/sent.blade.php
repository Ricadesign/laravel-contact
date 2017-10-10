
@component('mail::message')
# New message from {{ $name }}

{{ $text}}

{{ config('app.name') }}
@endcomponent
