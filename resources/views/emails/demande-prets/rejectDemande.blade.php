<x-mail::message>
# Reponse à votre demande de prêt

Votre demande de prêt pour le document
<a href="{{ route('document.show', ['slug' => $demandePret->document->getSlug(), 'document' => $demandePret->document->id]) }}"></a>
a été rejetée.

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
