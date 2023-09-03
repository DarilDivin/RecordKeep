@extends('admin.layouts.template')

@section('title')
    Dashboard-Chemises-Dossiers-Management
@endsection


@section('content')
    <div class="container develop">
        @include('admin.layouts.partials.sidebar')

        @livewire('chemises-table')
    </div>
@endsection
