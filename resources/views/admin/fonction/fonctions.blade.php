@extends('admin.layouts.template')

@section('title')
    Dashboard-Fonctions-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('fonctions-table')
    </div>
@endsection
