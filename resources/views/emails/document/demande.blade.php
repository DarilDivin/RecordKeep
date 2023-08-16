<x-mail::message>
# Nouvelle de mande de document

Une nouvelle demande de document à été fait pour le document
<a href="{{ route('document.show', ['slug' => $demande->document->getSlug(), 'document' => $demande->document]) }}">{{ $demande->document->nom }}</a>

-Prénoms : {{ $demande->user->prenoms }} <br>
-Noms : {{ $demande->user->nom }} <br>
-Téléphone : - <br>
-Email : {{ $demande->user->email }} <br>

**Motif:** <br>
{{ $demande->motif }}

**Durée du prêt** <br>
{{ $demande->duree }}


<x-mail::button :url="$urlaccept">
Accepter la demande
</x-mail::button>

<x-mail::button :url="$urlreject">
Rejeter la demande
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

