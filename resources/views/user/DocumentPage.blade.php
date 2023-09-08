
@extends('user.layouts.template')

@section('title')
    Documents
@endsection

@include('user.layouts.partials.navbar')

@section('content')
    <section>
        @livewire('document-page-table')
    </section>
    <div class="documentView">
        <div class="overlay"></div>
        <div class="view">
            <embed src="" width="400" type="" id="documentEmbed">
            <button class="closeDoc"><ion-icon name="close"></ion-icon></button>
        </div>
    </div>
@endsection
