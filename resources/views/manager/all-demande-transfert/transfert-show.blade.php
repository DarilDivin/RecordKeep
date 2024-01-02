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
@endsection
