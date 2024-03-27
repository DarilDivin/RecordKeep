<x-mail::message>
# Reponse à votre demande de prêt

Votre Demande de prêt pour le document
<a href="{{ route('document.show', ['slug' => $demandePret->document->getSlug(), 'document' => $demandePret->document->id]) }}">{{ $demandePret->document->nom }}</a>
a été acceptée, vous pouvez passer chercher le document à la DSI.

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
