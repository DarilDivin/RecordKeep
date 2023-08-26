@extends('admin.layouts.template')

@section('title')
    Dashboard-Role-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('roles-table')
    </div>
@endsection
