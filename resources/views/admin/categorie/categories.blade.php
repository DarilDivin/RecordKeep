@extends('admin.layouts.template')

@section('title')
    Dashboard-Categories-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('categories-table')
    </div>


@endsection
