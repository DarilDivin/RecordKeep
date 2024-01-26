@extends('user.layouts.template')

@section('title')
    Accueil
@endsection

@section('style')
@vite(['resources/css/app.css', 'resources/js/home.js'])
@endsection

@section('content')
    @include('user.layouts.partials.navbar')
    @livewire('home')
@endsection

