@extends('manager.layouts.template')

@section('title')
    Gestion des Documents
@endsection

@section('content')
    <div class="container develop">
        @include('manager.layouts.partials.sidebar')

        @livewire('classed-documents-table')
    </div>
@endsection
