@extends('admin.layouts.template')

@section('title')
    Dashboard-Permission-Management
@endsection


@section('content')
    <div class="container develop">
        @include('admin.layouts.partials.sidebar')

        @livewire('permissions-table')
    </div>

@endsection
