<section>
    <section class="search-zone">
        <h3>Rechercher un document</h3>
        <div class="search-form">
            <div class="inputcontainer">
                <label for="">Nom</label>
                <input type="text" wire:model="nom"  class="search-bar" placeholder="" minlength="1">
            </div>
            <div class="inputcontainer">
                <label for="">Du</label>
                <input type="date"  class="search-bar" placeholder="" minlength="1">
            </div>
            <div class="inputcontainer">
                <label for="">Au</label>
                <input type="date"  class="search-bar" placeholder="" minlength="1">
            </div>
            <div class="inputcontainer">
                <label for="">Mots-clés</label>
                <input type="text" wire:model="motclefs" class="search-bar" placeholder="" minlength="1">
            </div>
        </div>
    </section>
    {{-- <section class="documentList list">
        <div class="sectionIndication">
            <h3>Document List</h3>
            <div class="listOption">
                <ion-icon name="list" class="list-icon"></ion-icon>
                <ion-icon name="grid" class="grid-icon"></ion-icon>
            </div>
        </div>
        <div class="documents" x-data="{ documentChecked : [] }">
            <style>
                [x-cloak]{
                    display: none !important;
                }
            </style>
            <button x-show="documentChecked.length > 0" class="btndownload" x-on:click="$wire.filesdownload(documentChecked)" x-cloak>Télécharger</button>
            @forelse ($documents as $document)
                <div class="document" >
                    <div class="documentLine">

                        <input type="checkbox" name="document[]" id="{{ $document->id }}" value="{{ $document->id }}" x-model="documentChecked">

                        <div class="documentIcon">
                            <img src="storage/images/pdf-1.png" alt="">
                        </div>
                        <div class="documentName">
                            <p><a href="{{ route('document.show', ['slug' => $document->getSlug(), 'document' => $document]) }}">{{ $document->nom }}</a></p>
                        </div>
                        <div class="documentCreationDate">
                            <p>{{ $document->datecreation }}</p>
                        </div>
                        <div class="documentSize">
                            <p>250ko</p>
                        </div>
                        <div class="documentOptions">
                            <button class="consult" data-document-link="storage/{{ $document->document }}" type="button" x-on:click="$wire.incrementConsult({{ $document }})">
                                <ion-icon name="eye-outline"></ion-icon>
                                <p>Consulter</p>
                            </button>
                            <button class="download">
                                <a href="{{ route('document.download', ['document' => $document]) }}" type="button">
                                    <ion-icon name="download"></ion-icon>
                                    <p>Télécharger</p>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                Aucun Document ne correspond à votre recherche
            @endforelse
        </div>
        {{ $documents->onEachSide(0)->links() }}
    </section> --}}

    <section class="documentList list" x-data="{ documentChecked : [] }">
            <style>
                [x-cloak]{
                    display: none !important;
                }
            </style>
            <button x-show="documentChecked.length > 0" class="btndownload" x-on:click="$wire.filesdownload(documentChecked)" x-cloak style="align-self: flex-start;">Télécharger</button>
        @forelse ($documents as $document)
            <div class="documentLine">
                <div class="check">
                    <input type="checkbox" name="document[]" id="{{ $document->id }}" value="{{ $document->id }}" x-model="documentChecked">
                </div>
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
                        <p><span>125ko</span></p>
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
                        <p>{{ $document->datecreation }}</p>
                    </div>
                    <div class="docMoreInfosItem">
                        {{-- <p>{{ $document->motclefs }}</p> --}}
                        <p>#babamama</p>
                        <p>#babatruc</p>
                        <p>#babatruc</p>
                    </div>
                </div>
                <div class="docOptions">
                    {{-- <button class="consult" data-document-link="storage/{{ $document->document }}" type="button" x-on:click="$wire.incrementConsult({{ $document }})">
                        <ion-icon name="eye-outline"></ion-icon>
                        <p>Consulter</p>
                    </button> --}}
                    <button class="btn consult" data-document-link="storage/{{ $document->document }}" type="button" x-on:click="$wire.incrementConsult({{ $document }})">Consulter</button>
                    <button class="btn download">
                        <a href="{{ route('document.download', ['document' => $document]) }}">Télécharger</a>
                    </button>
                    <button class="btn more">
                        <a href="{{ route('document.show', ['slug' => $document->getSlug(), 'document' => $document]) }}">Plus</a>
                    </button>
                </div>
            </div>
        @empty
            Aucun Document ne correspond à votre recherche
        @endforelse

        {{ $documents->onEachSide(0)->links() }}
</section>
</section>
