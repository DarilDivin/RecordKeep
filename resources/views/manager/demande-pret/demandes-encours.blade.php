@extends('admin.layouts.template')

@section('title')
    Demandes de Prêts
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Demandes de Prêts</p>
                <ion-icon name="document-lock-outline"></ion-icon>
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
                @foreach ($demandes as $demande)
                    <div class="card" data-label="{{ $demande->etat }}">
                        <div class="head">
                            <div class="titleInfos ">
                                <h3>Demande de prêt</h3>
                                <span>{{ $demande->user->direction->direction }}</span>
                            </div>
                            <span>{{ $demande->created_at->translatedFormat('d F Y') }}</span>
                        </div>
                        <div class="body">
                            <div class="info">
                                <p>Document</p>
                                <span>{{ $demande->document->nom }}</span>
                            </div>
                            <div class="info">
                                <p>Demandeur</p>
                                <span>{{ $demande->user->nom }} {{ $demande->user->prenoms }}</span>
                            </div>
                            <div class="info">
                                <p>Durée</p>
                                <span>{{ $demande->duree }} Jours</span>
                            </div>
                        </div>
                        <div class="foot">
                            @if ($demande->etat === 'Encours')
                                <a href="{{ route('document.demande.accept', ['demande' => $demande->id]) }}">Accepter</a>
                                <a href="{{ route('document.demande.reject', ['demande' => $demande->id]) }}">Rejeter</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
