@extends('admin.layouts.template')

@section('title')
    Dashboard-Document-Nature-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('natures-table')
    </div>

@endsection
