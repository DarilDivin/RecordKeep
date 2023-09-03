@extends('admin.layouts.template')

@section('title')
    Dashboard-Boite-Archive-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('boites-table')
    </div>
@endsection
