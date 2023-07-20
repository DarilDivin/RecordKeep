@extends('user.layouts.template')

@section('title')
    Dossier
@endsection

@section('style')
    @vite(['resources/css/FolderPage.css', 'resources/js/DocumentPage.js'])
@endsection

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
                            <button class="consult">
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
                            <ion-icon name="folder"></ion-icon>
                        </div>
                        <div class="documentName">
                            <p>Dossier</p>
                        </div>
                        <div class="documentmodificationDate">
                            <small>Modifié le 25/06/2023</small>
                        </div>
                        <div class="documentOptions">
                            <button class="consult">
                                <a href="FolderContentPage.html">
                                    <ion-icon name="folder-open-outline"></ion-icon>
                                    <p>Ouvrir</p>
                                </a>
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
