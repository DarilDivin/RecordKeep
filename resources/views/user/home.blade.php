@extends('user.layouts.template')

@section('title')
    Accueil
@endsection

@section('style')
@vite(['resources/css/app.css', 'resources/js/home.js'])
@endsection

@section('content')
    @include('user.layouts.partials.navbar')
    <section class="search-zone">
        <h3>Rechercher un document</h3>
        <form action="" method="post" class="search-form">
            <div class="inputcontainer">
                <label for="">Nom</label>
                <input type="search"  class="search-bar" placeholder="Rechercher..." minlength="1">
            </div>
            <div class="inputcontainer">
                <label for="">Nom</label>
                <input type="search"  class="search-bar" placeholder="Rechercher..." minlength="1">
            </div>
            <div class="inputcontainer">
                <label for="">Nom</label>
                <input type="search"  class="search-bar" placeholder="Rechercher..." minlength="1">
            </div>
            <div class="inputcontainer">
                <label for="">Nom</label>
                <input type="search"  class="search-bar" placeholder="Rechercher..." minlength="1">
            </div>


            <button type="submit">Rechercher</button>
        </form>
    </section>

    <section class="recent">
        <div class="recent-title">
            <h3> Accès rapide </h3>
        </div>
        <div class="recent-container">

            @foreach ($documents as $document)
                <div class="recent-element">
                    <a href="{{ route('document.show', ['slug' => $document->getSlug(), 'document' => $document]) }}"><img src="storage/images/pdf-1.png" alt=""></a>
                    <p>{{ $document->nom }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection

