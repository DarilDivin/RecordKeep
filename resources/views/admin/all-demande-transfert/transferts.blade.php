@extends('admin.layouts.template')

@section('title')
    Dashboard-Demande-Transfert-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('all-transferts-table')
    </div>
@endsection
