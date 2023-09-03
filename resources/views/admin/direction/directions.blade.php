@extends('admin.layouts.template')

@section('title')
    Dashboard-Direction-Management
@endsection


@section('content')
    <div class="container develop">
        @include('admin.layouts.partials.sidebar')

        @livewire('directions-table')
    </div>


@endsection
