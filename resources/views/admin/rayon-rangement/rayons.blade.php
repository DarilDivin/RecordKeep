@extends('admin.layouts.template')

@section('title')
    Dashboard-Rangement-Rayon-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('rayons-table')
    </div>
@endsection
