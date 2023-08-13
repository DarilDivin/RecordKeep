
@extends('user.layouts.template')

@section('title')
    Documents
@endsection

{{-- @section('style')
    @vite(['resources/css/DocumentPage.css', 'resources/js/DocumentPage.js'])
@endsection --}}

@include('user.layouts.partials.navbar')

@section('content')
    <section class="documentList list">
        <div class="sectionIndication">
            <h3>Document List</h3>
            <div class="searchBar">
                <form action="">
                    <input type="search" name="rechercheDocument" id="">
                    <ion-icon name="search"></ion-icon>
                </form>
            </div>
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
                            {{-- <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a> --}}
                        </div>
                        <div class="documentCreationDate">
                            <p>{{ $document->datecreation }}</p>
                        </div>
                        <div class="documentSize">
                            <p>250ko</p>
                        </div>
                        <div class="documentOptions">
                            <!-- <button class="edit"> <ion-icon name="create"></ion-icon> Editer</button>
                            <button class="delete"> <ion-icon name="trash"></ion-icon> Supprimer</button>
                            <button class="archive"> <ion-icon name="archive"></ion-icon> Archiver</button> -->
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

    {{-- @include('shared.pagination', ['paginator' => $documents]) --}}

                    {{-- <ul>
                        @foreach ($documents->links() as $link)
                            <li>{{ $link }}</li>
                        @endforeach
                    </ul> --}}
    {{-- {{ $documents->links() }} --}}
    {{-- {{ $documents->links('shared.pagination', ['onEachSide' => 5]) }} --}}

    {{ $documents->onEachSide(0)->links('shared.pagination') }}

@endsection
