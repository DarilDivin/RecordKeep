@extends('admin.layouts.template')

@section('title')
    Admin-Document-Management
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('classed-documents-table')
    </div>
@endsection
