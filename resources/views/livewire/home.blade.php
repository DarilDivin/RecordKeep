<section>
    @can('Rechercher un Document')
        <section class="search-zone">
            <h3>Rechercher un document</h3>
            <div class="search-form">
                <div class="inputcontainer">
                    <label for="">Nom</label>
                    <input type="text" wire:model="nom"  class="search-bar" placeholder="Nom du document" minlength="1">
                </div>
                <div class="inputcontainer">
                    <label for="">Du</label>
                    <input type="date" wire:model="dateDeb"  class="search-bar" placeholder="" minlength="1">
                </div>
                <div class="inputcontainer">
                    <label for="">Au</label>
                    <input type="date" wire:model="dateFin"  class="search-bar" placeholder="" minlength="1">
                </div>
                <div class="inputcontainer">
                    <label for="">Mots-clés (Séparés par "#")</label>
                    <input type="text" wire:model="motclefs" class="search-bar" placeholder="Mot-clé#Mot-clé" minlength="1">
                </div>
            </div>
        </section>
    @endcan

    <section class="documentList list" x-data="{ documentChecked : [] }">
            @can('Télécharger un Document')
                <button x-show="documentChecked.length > 0" class="btndownload" x-on:click="$wire.filesdownload(documentChecked)" x-cloak style="align-self: flex-start;">Télécharger</button>
            @endcan
        @forelse ($documents as $document)
            <div class="documentLine">
                @can('Télécharger un Document')
                    <div class="check">
                        <input type="checkbox" name="document[]" id="{{ $document->id }}" value="{{ $document->id }}" x-model="documentChecked">
                    </div>
                @endcan
                <div class="docImage">
                    <div class="image">
                        <img src="storage/images/doc3.png" alt="">
                    </div>
                </div>
                <div class="docInfos">
                    <div class="docInfosItem nom">
                        <p>
                            <a href="{{ route('document.show', ['slug' => $document->getSlug(), 'document' => $document]) }}">{{ $document->nom }}</a>
                        </p>
                    </div>
                    <div class="docInfosItem">
                        <p><span>{{ number_format((filesize(public_path('storage/' . $document->document )) / 1024), 2, ',', '') }} ko</span></p>
                    </div>
                    <div class="docInfosItem">
                        <p><span>{{ $document->nbrconsult }}</span> Consultations </p>
                    </div>
                    <div class="docInfosItem">
                        <p><span>{{ $document->nbrdownload }}</span> Téléchargements </p>
                    </div>
                </div>
                <div class="docMoreInfos">
                    <div class="docMoreInfosItem">
                        <p>{{ $document->getDateCreation()->translatedFormat('d F Y') }}</p>
                    </div>
                    <div class="docMoreInfosItem">
                        @php
                            $motsclefs = explode('#', $document->motclefs);
                            unset($motsclefs[0]);
                        @endphp
                        @foreach ($motsclefs as $motClef)
                            <p>{{ '#'.$motClef }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="docOptions">

                    @can('Consulter un Document')
                        <button class="btn consult" data-document-link="storage/{{ $document->document }}" type="button" x-on:click="$wire.incrementConsult({{ $document }})">Consulter</button>
                    @endcan

                    @can('Télécharger un Document')
                        <form action="{{ route('document.download', ['document' => $document]) }}" method="POST" style="margin-bottom: -11px;">
                            @csrf
                            @method('post')
                            <button class="btn download">Télécharger</button>
                        </form>
                    @endcan
                    @hasrole('Utilisateur')
                        <button class="btn more">
                            <a href="{{ route('document.show', ['slug' => $document->getSlug(), 'document' => $document]) }}">Plus</a>
                        </button>
                    @endhasrole
                </div>
            </div>
        @empty
            Aucun document disponible
        @endforelse
        <br>
            @if ($documents->count() > 20)
                {{ $documents->onEachSide(0)->links() }}
            @endif

    </section>
</section>
