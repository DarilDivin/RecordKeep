{{-- <x-mail::message> --}}
# Nouvelle de mande de document

Une nouvelle demande de document à été fait pour le document <a href="{{ route('document.show', ['slug' => $document->getSlug(), 'document' => $document]) }}">{{ $document->nom }}</a>

-Prénoms : {{ $data['prenoms'] }} <br>
-Noms : {{ $data['nom'] }} <br>
-Téléphone : {{ $data['telephone'] }} <br>
-Email : {{ $data['email'] }} <br>

**Motif:** <br>
{{ $data['motif'] }}

**Durée du prêt** <br>
{{ $data['duree'] }}

{{-- <x-mail::button :url="' '">
    <a href="{{ route('document.demande.accept', ['destination' => $data['email']]) }}">
    Accepter la demande
    </a>
</x-mail::button> --}}

{{-- <x-mail::button :url="$urlaccept"> --}}
Accepter la demande
{{-- </x-mail::button> --}}

{{-- <x-mail::button :url="$urlreject"> --}}
Rejeter la demande
{{-- </x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
{{-- </x-mail::message> --}}



<form action="{{ $urlaccept }}" method="post">
    @method('post')
    <input type="text" value="{{ $data['prenoms'] }}" name="prenoms">
    <button type="submit">
        accept
    </button>
</form>
