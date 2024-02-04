@extends('admin.layouts.template')

@section('title')
    Dashboard-rapport-Management
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Rapports de Prêts</p>
                <ion-icon name="swap-horizontal"></ion-icon>
            </div>

            <div class="sidebarOptions">
                <div class="sidebarOptionContainerOverlay"></div>
                <div class="sidebarOptionContainer">
                    <div class="optionContainer">
                        <a href="Document-classé.html">
                            <ion-icon name="archive"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>

            {{-- <div class="optional">
                <form action="">
                    <div class="search-box">
                        <input type="text" name="search">
                        <ion-icon name="search"></ion-icon>
                    </div>
                </form>
            </div> --}}

            @if (session('success'))
                <div class="message success">
                    {!! session('success') !!}
                </div>
            @endif

            <div class="cardContainer">
                @forelse ($rapports as $rapport)
                    <div class="card" data-label="{{ $rapport->demandePret->etat }}">
                        <div class="head">
                            <div class="titleInfos ">
                                <h3>Rapport de Prêt</h3>
                                <span>{{ $rapport->demandePret->user->direction->sigle }}</span>
                            </div>
                            <span>{{ $rapport->created_at->translatedFormat('d/m/Y') }}</span>
                        </div>
                        <div class="body">
                            <div class="info">
                                <p>Timbre du Document</p>
                                <span>{{ $rapport->demandePret->document->timbre }}</span>
                            </div>
                            <div class="info">
                                <p>Nom du Document</p>
                                <span>{{ $rapport->demandePret->document->nom }}</span>
                            </div>
                            <div class="info">
                                <p>Nom de l'utilisateur</p>
                                <span>{{ $rapport->demandePret->user->nom }} {{ $rapport->demandePret->user->prenoms }}</span>
                            </div>
                        </div>
                        <div class="foot">
                            <a href="{{ route('rapport-retour-create', ['rapportDepart' => $rapport->id]) }}">Générer un retour de prêt</a>
                        </div>
                    </div>
                @empty

                @endforelse

            </div>
        </div>
    </div>

@endsection
