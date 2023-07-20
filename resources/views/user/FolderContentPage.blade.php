@extends('user.layouts.template')

@section('title')
    Contenu dossier
@endsection

@section('style')
    @vite(['resources/css/FolderContentPage.css', 'resources/js/DocumentPage.js'])
@endsection

@include('user.layouts.partials.navbar')

@section('content')
    <section class="documentList list">
        <div class="sectionIndication">
            <h3>Dossier > Sous-Dossier > </h3>
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
            <div class="document">
                    <div class="documentLine">
                        <div class="documentIcon">
                            <ion-icon name="folder"></ion-icon>
                        </div>
                        <div class="documentName">
                            <p>Dossier</p>
                        </div>
                        <div class="documentmodificationDate">
                            <small>Modifié le 25/06/2023</small>
                        </div>
                        <div class="documentOptions">
                            <button class="open-folder">
                                <a href="FolderContentPage.html">
                                    <ion-icon name="folder-open-outline"></ion-icon>
                                    <p>Ouvrir</p>
                                </a>
                            </button>
                        </div>
                    </div>
            </div>
            <div class="document">
                <div class="documentLine">
                    <div class="documentIcon">
                        <ion-icon name="document-text-outline"></ion-icon>
                    </div>
                    <div class="documentName">
                        <p>AOF-DSI</p>
                    </div>
                    <div class="documentCreationDate">
                        <p><small>25 Juin 2023</small></p>
                    </div>
                    <div class="documentSize">
                        <p><small>250ko</small></p>
                    </div>
                    <div class="documentOptions">
                        <button class="consult"> <ion-icon name="eye-outline"></ion-icon><p>Consulter</p></button>
                        <button class="download"> <ion-icon name="download"></ion-icon><p>Télécharger</p></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="documentView">
        <div class="overlay"></div>
        <div class="view">
            <embed src="../La_culture_générale_by_Florence.pdf" width="400" type="">
            <button class="closeDoc">Fermer</button>
        </div>
    </div>
@endsection
