@extends('admin.layouts.template')

@section('title')
    Admin-Document-Management
@endsection

@section('content')

    <div class="container develop">
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
                </div>
            </div>
            @livewire('documents-table')
        </div>
    </div>
    <div class="warningMessageContainer">
        <div class="overlay"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment supprimer ce document ?</h3>
            <form action="" class="deleteForm" method="POST">
                @csrf
                @method('delete')
                <button type="button" class="closeWarning">Annuler</button>
                <button type="submit" class="submitdeleteForm">Supprimer</button>
            </form>
        </div>
    </div>
@endsection
