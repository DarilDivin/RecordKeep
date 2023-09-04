@extends('admin.layouts.template')

@section('title')
    Gestion des Documents
@endsection

@section('content')
    <div class="container develop">
        @include('admin.layouts.partials.sidebar')

        @livewire('classed-documents-table')
    </div>
@endsection
