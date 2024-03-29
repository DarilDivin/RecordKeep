@extends('admin.layouts.template')

@section('title')
    Gestion des Demandes de Transferts
@endsection


@section('content')
    <div class="container develop">
        @include('admin.layouts.partials.sidebar')

        @livewire('all-transferts-table')
    </div>
@endsection
