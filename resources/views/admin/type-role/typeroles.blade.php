@extends('admin.layouts.template')

@section('title')
    Admin-Type-Of-Role-Management
@endsection


@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        @livewire('types-roles-table')
    </div>
@endsection
