@extends('manager.layouts.template')

@section('title')
    Gestion des Boîtes d'Archives
@endsection


@section('content')
    <div class="container develop">
        @include('manager.layouts.partials.sidebar')

        @livewire('boites-table')
    </div>
    <div class="warningMessageContainer">
        <div class="overlay"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment supprimer cette boite ?</h3>
            <form action="" class="deleteForm" method="POST">
                @csrf
                @method('delete')
                <button type="button" class="closeWarning">Annuler</button>
                <button type="submit" class="submitdeleteForm">Supprimer</button>
            </form>
        </div>
    </div>
@endsection
