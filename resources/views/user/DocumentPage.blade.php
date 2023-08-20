
@extends('user.layouts.template')

@section('title')
    Documents
@endsection

@include('user.layouts.partials.navbar')

@section('content')

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
        <div class="documents">
            @foreach ($documents as $document)
                <div class="document">
                    <div class="documentLine">
                        <div class="documentIcon">
                            <ion-icon name="document-text-outline"></ion-icon>
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
                            <button class="consult" data-document-link="storage/{{ $document->document }}"> <ion-icon name="eye-outline"></ion-icon><p>Consulter</p></button>
                            <button class="download"> <ion-icon name="download"></ion-icon><p>Télécharger</p></button>
                        </div>
                    </div>
                </div>

            @endforeach


    </section>
    <div class="documentView">
        <div class="overlay"></div>
        <div class="view">
            <embed src="" width="400" type="" id="documentEmbed">
            <button class="closeDoc"><ion-icon name="close"></ion-icon></button>
        </div>
    </div>

    {{ $documents->onEachSide(0)->links('shared.pagination') }}

@endsection
