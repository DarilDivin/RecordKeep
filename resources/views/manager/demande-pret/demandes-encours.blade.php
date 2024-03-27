@extends('admin.layouts.template')

@section('title')
    Demandes de Prêts
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('demande-prets-table')
    </div>
@endsection
