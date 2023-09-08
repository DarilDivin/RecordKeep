@extends('admin.layouts.template')

@section('title')
    Gestion des Catégories
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('categories-table')
    </div>
    <div class="warningMessageContainer">
        <div class="overlay"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment supprimer cette catégorie ?</h3>
            <form action="" class="deleteForm" method="POST">
                @csrf
                @method('delete')
                <button type="button" class="closeWarning">Annuler</button>
                <button type="submit" class="submitdeleteForm">Supprimer</button>
            </form>
        </div>
    </div>
@endsection
