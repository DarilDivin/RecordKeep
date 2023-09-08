
@extends('user.layouts.template')

@section('title')
    Documents
@endsection

@section('content')

    @include('user.layouts.partials.navbar')

    {{-- <section class="search-zone">
        <h3>Rechercher un document</h3>
        <form action="" method="get" class="search-form">
            <div class="inputcontainer">
                <label for="">Nom</label>
                <input type="text"  class="search-bar" name="nom" placeholder="" minlength="1" value="{{ $input['nom'] ?? ''}}">
            </div>
            <div class="inputcontainer">
                <label for="">Du</label>
                <input type="date"  class="search-bar" name="dateDébut" placeholder="" minlength="1" value="{{ $input['dateDébut'] ?? ''}}">
            </div>
            <div class="inputcontainer">
                <label for="">Au</label>
                <input type="date"  class="search-bar" name="dateFin" placeholder="" minlength="1" value="{{ $input['dateFin'] ?? ''}}">
            </div>
            <div class="inputcontainer">
                <label for="">Mot-clé</label>
                <input type="text"  class="search-bar" name="motclé" placeholder="" minlength="1" value="{{ $input['motclé'] ?? ''}}">
            </div>


            <button type="submit">Rechercher</button>
        </form>
    </section> --}}
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

    {{-- {{ $documents->onEachSide(0)->links('shared.pagination') }} --}}

@endsection
