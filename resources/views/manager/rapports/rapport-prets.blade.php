@extends('admin.layouts.template')

@section('title')
    Dashboard-rapport-Management
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('rapport-prets-table')
    </div>

@endsection
