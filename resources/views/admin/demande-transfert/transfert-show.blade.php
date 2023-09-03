@extends('admin.layouts.template')

@section('title')
    Admin-Document-Management
@endsection

@section('content')

<div class="container develop">
    @include('admin.layouts.partials.sidebar')

    @livewire('show-transfert-table', [
        'transfert' => $transfert
    ])
</div>

@endsection
