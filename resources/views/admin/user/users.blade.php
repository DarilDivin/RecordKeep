@extends('admin.layouts.template')

@section('title')
    Dashboard-User-Management
@endsection

{{-- @section('style')
    @vite(['resources/css/Dashboard-User-Document-Management.css', 'resources/js/Dashboard-User-Management.js'])
@endsection --}}


@section('content')
    <div class="container develop">
        @include('admin.layouts.partials.sidebar')

        @livewire('users-table')
    </div>
@endsection
