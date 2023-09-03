@extends('admin.layouts.template')

@section('title')
    Dashboard-Division-Management
@endsection


@section('content')
    <div class="container develop">
        @include('admin.layouts.partials.sidebar')

        @livewire('divisions-table')
    </div>
@endsection
