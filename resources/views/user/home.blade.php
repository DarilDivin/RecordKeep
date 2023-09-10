@extends('user.layouts.template')

@section('title')
    Accueil
@endsection

@section('style')
@vite(['resources/css/app.css', 'resources/js/home.js'])
@endsection

@section('content')
    @include('user.layouts.partials.navbar')
    @can('Rechercher un Document')
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
    @endcan

    <section class="recent">
        <div class="recent-title">
            <h3> Accès rapide </h3>
        </div>
        <div class="recent-container">
            @foreach ($documents as $document)
            <div class="recentDocumentCard">
                <div class="docImage">
                    <div class="image">
                        <img src="storage/images/doc3.png" alt="">
                    </div>
                </div>
                <div class="docInfos">
                    <div class="docInfosItem nom">
                        <p>
                            <a href="{{ route('document.show', ['slug' => $document->getSlug(), 'document' => $document]) }}">{{ $document->nom }}</a>
                        </p>
                    </div>
                    <div class="docInfosItem">
                        <p><span>125ko</span></p>
                    </div>
                    <div class="docInfosItem">
                        <p><span>{{ $document->nbrconsult }}</span> Consultations </p>
                    </div>
                    <div class="docInfosItem">
                        <p><span>{{ $document->nbrdownload }}</span> Téléchargements </p>
                    </div>
                    <div class="docOptions">
                    @can('Télécharger un Document')
                        <button class="btn download">
                            <a href="{{ route('document.download', ['document' => $document]) }}">Télécharger</a>
                        </button>
                    @endcan
                    @hasrole('Utilisateur')
                        <button class="btn more">
                            <a href="{{ route('document.show', ['slug' => $document->getSlug(), 'document' => $document]) }}">Plus</a>
                        </button>
                    @endhasrole
                </div>
                </div>

            </div>
            @endforeach
        </div>
    </section>
@endsection

