<x-mail::message>
# Rappel de fin de votre prêt de document

La durée de votre Demande de Prêt pour le document
<a href="{{ route('document.show', ['slug' => $demandePret->document->getSlug(), 'document' => $demandePret->document->id]) }}"></a>
est écoulée, vous êtes donc tenue de rapporter le Document à la DSI.

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
