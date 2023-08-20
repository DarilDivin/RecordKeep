@extends('admin.layouts.template')

@section('title')
    Admin-Document-Management
@endsection

@section('content')

<div class="container">
    @include('admin.layouts.partials.sidebar')

    <div class="main">
        <div class="title">
            <p>Manage Document</p>
            <ion-icon name="document-text"></ion-icon>
        </div>



        <div class="sidebarOptions">
            <div class="sidebarOptionContainerOverlay"></div>
            <div class="sidebarOptionContainer">
                <div class="optionContainer">
                    <a href="Document-classé.html">
                        <ion-icon name="archive"></ion-icon>
                    </a>
                </div>
                <!-- <div class="optionContainer"><ion-icon name="apps"></ion-icon></div>
                <div class="optionContainer"><ion-icon name="bookmarks"></ion-icon></div>
                <div class="optionContainer"><ion-icon name="car-sport"></ion-icon></div>
                <div class="optionContainer"><ion-icon name="cog"></ion-icon></div>
                <div class="optionContainer"><ion-icon name="earth"></ion-icon></div>
                <div class="optionContainer"><ion-icon name="document-lock"></ion-icon></div>
                <div class="optionContainer"><ion-icon name="finger-print"></ion-icon></div>
                <div class="optionContainer"><ion-icon name="laptop"></ion-icon></div> -->
            </div>
        </div>

        <div class="optional">
            <div class="buttons">
                <button class="filter">
                    <ion-icon name="filter"></ion-icon>
                    Filtrer
                </button>
                <button class="add">
                    <ion-icon name="add"></ion-icon>
                    <a href="{{ route('admin.document.create') }}">Ajouter Document</a>
                </button>
            </div>
            <form action="">
                <div class="check-categorie-documents">
                    <select name="" id="">
                        <option value="service informatique">Service Informatique</option>
                        <option value="service informatique">Secrétariat</option>
                        <option value="service informatique">Service Informatique et quelque chose</option>
                        <option value="service informatique">Service Informatique</option>
                    </select>
                </div>
                <div class="search-box">
                    <input type="text">
                    <ion-icon name="search"></ion-icon>
                </div>
                <div class="search-box">
                    <input type="text">
                    <ion-icon name="search"></ion-icon>
                </div>
            </form>
        </div>

        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        <div class="tableau">
            <table class="table">
                <thead>
                    <tr>
                        <td>Code</td>
                        <td>Nom du document</td>
                        <td>Date de création</td>
                        <td>DUA</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($documents as $document)
                    <tr>
                        <td>{{ $document->signature }}</td>
                        <td>{{ $document->nom }}</td>
                        <td>{{ $document->created_at }}</td>
                        <td>{{ $document->dua }}ans</td>
                        <td>
                            <button class="edit"><a href="{{ route('admin.document.edit', ['document' => $document->id]) }}">Éditer</a></button>
                            {{-- <button class="delete">
                                <a href="{{ route('admin.document.destroy', ['document' => $document->id]) }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('deleteForm{{ $document->id }}').submit();">
                                    Supprimer
                                </a>
                                <form action="{{ route('admin.document.destroy', ['document' => $document->id]) }}" method="POST" style="" id="deleteForm{{ $document->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </button> --}}
                            <button
                            class="delete"
                            routeForDeleting="{{ route('admin.document.destroy', ['document' => $document->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                            <button class=""><a href="">Infos</a></button>
                            <button class="classer"><a href="{{ route('admin.document.classement', ['document' => $document->id]) }}">Classer</a></button>

                        </td>
                    </tr>
                    @empty
                        AUCUN DOCUMENT EN BASE DE DONNÉES
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="warningMessageContainer">
    <div class="overlay"></div>
    <div class="warning">
        <ion-icon name="alert-circle"></ion-icon>
        <h3>Est vous sur de vouloir supprimer cet élément ??</h3>
        <form action="" class="deleteForm" method="POST">
            @csrf
            @method('delete')
            <button type="button" class="closeWarning">Annuler</button>
            <button type="submit" class="submitdeleteForm">Supprimer</button>
        </form>
    </div>
</div>
@endsection
