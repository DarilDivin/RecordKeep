@extends('admin.layouts.template')

@section('title')
    Gestion des Fonctions
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('fonctions-table')
    </div>
    <div class="warningMessageContainer" id="one">
        <div class="overlay one"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment supprimer cette fonction ?</h3>
            <form action="" class="deleteForm one" method="POST">
                @csrf
                @method('delete')
                <button type="button" class="closeWarning one">Annuler</button>
                <button type="submit" class="submitdeleteForm">Supprimer</button>
            </form>
        </div>
    </div>
@endsection
