@extends('admin.layouts.template')

@section('title')
    Gestion des Demandes de Transferts
@endsection

@section('content')

    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('show-all-transfert-table', [
            'transfert' => $transfert
        ])
    </div>
    <div class="warningMessageContainer">
        <div class="overlay"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment retirez ce document de la demande de transfert ?</h3>
            <form action="" class="deleteForm" method="POST">
                @csrf
                @method('put')
                <button type="button" class="closeWarning">Annuler</button>
                <button type="submit" class="submitdeleteForm">Retirer</button>
            </form>
        </div>
    </div>
@endsection
