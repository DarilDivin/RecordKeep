@extends('manager.layouts.template')

@section('title')
    Gestion des Demandes de Transferts
@endsection


@section('content')
    <div class="container develop">
        @include('manager.layouts.partials.sidebar')

        @livewire('demande-transferts-table', [
            'showButton' => $showButton,
            'currentTransfert' => $currentTransfert
        ])
    </div>
    <div class="warningMessageContainer">
        <div class="overlay"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Confirmer l'annulation de cette demande de transfert ?</h3>
            <form action="" class="deleteForm" method="POST">
                @csrf
                @method('delete')
                <button type="button" class="closeWarning">Annuler</button>
                <button type="submit" class="submitdeleteForm">Confirmer</button>
            </form>
        </div>
    </div>
@endsection
