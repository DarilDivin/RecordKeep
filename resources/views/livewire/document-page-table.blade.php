<section>
<section class="search-zone">
    <h3>Rechercher un document</h3>
    <form action="" method="get" class="search-form">
        <div class="inputcontainer">
            <label for="">Nom</label>
            <input type="text"  class="search-bar" name="nom" placeholder="" minlength="1" value="{{ $input['nom'] ?? ''}}">
        </div>
        <div class="inputcontainer">
            <label for="">Du</label>
            <input type="date"  class="search-bar" name="dateDébut" placeholder="" minlength="1" value="{{ $input['dateDébut'] ?? ''}}">
        </div>
        <div class="inputcontainer">
            <label for="">Au</label>
            <input type="date"  class="search-bar" name="dateFin" placeholder="" minlength="1" value="{{ $input['dateFin'] ?? ''}}">
        </div>
        <div class="inputcontainer">
            <label for="">Mot-clé</label>
            <input type="text"  class="search-bar" name="motclé" placeholder="" minlength="1" value="{{ $input['motclé'] ?? ''}}">
        </div>


        <button type="submit">Rechercher</button>
    </form>
</section>
<section class="documentList list">
    <div class="sectionIndication">
        <h3>Document List</h3>
        {{-- <div class="searchBar">
            <form action="">
                <input type="search" name="rechercheDocument" id="">
                <ion-icon name="search"></ion-icon>
            </form>
        </div> --}}
        <div class="listOption">
            <ion-icon name="list" class="list-icon"></ion-icon>
            <ion-icon name="grid" class="grid-icon"></ion-icon>
        </div>
    </div>
    <div class="documents" x-data="{
        documentChecked : []
    }">
        <button x-show="documentChecked.length > 0" class="btndownload" x-on:click="$wire.filesdownload(documentChecked)">Télécharger</button>
        {{-- <span x-html="JSON.stringify(documentChecked)"></span> --}}
        {{-- <div class="documentLine">
            <input type="checkbox" name="document[]" id="{{ $document->id }}" value="{{ $document->id }}" x-model="documentChecked">

            <div class="documentIcon">
                <img src="storage/images/pdf.png" alt="">
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
                <button class="consult" data-document-link="storage/{{ $document->document }}" type="button">
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
        </div> --}}
        @foreach ($documents as $document)
            <div class="document" >
                <div class="documentLine" data-aos="zoom-out" data-aos-once="true">
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
        @endforeach

            {{-- {{ $documents->links() }} --}}
    </div>
    {{ $documents->onEachSide(0)->links() }}
</section>
</section>
