@extends('admin.layouts.template')

@section('title')
    Dashboard-Service-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('services-table')
    </div>
@endsection
