<x-mail::message>
# Message de {{ $message['nom'] }}

-Email : {{ $message['mail'] }}

**Message:** <br>
{{ $message['message'] }}

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
