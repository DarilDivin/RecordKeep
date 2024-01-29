@extends('user.layouts.template')

@section('title')
    {{ $document->nom }}
@endsection

@section('content')

    @include('user.layouts.partials.navbar')
    <section class="voir">
        <section class="voirInfosDoc">
            <div class="voirDoc">
                <div class="doc">
                    <a href="#"><ion-icon name="document-text"></ion-icon></a>
                    <div class="badge disponibilite">
                            <p>
                                @if ($document->disponibilite)
                                    Disponible au prêt
                                @else
                                    Indisponible au prêt
                                @endif
                            </p>
                    </div>
                </div>
                <div class="docOptions">
                    {{-- <button class="consult" data-document-link="storage/{{ $document->document }}">
                        <ion-icon name="eye-outline"></ion-icon>
                        <p>Consulter</p>
                </button> --}}
                {{-- <button class="download">
                    <a href="{{ route('document.download', ['document' => $document]) }}">
                        <ion-icon name="download"></ion-icon>
                        <p>Télécharger</p>
                    </a>
                </button> --}}
                </div>
            </div>
            <div class="infosDoc">
                <table class="table">
                    <tr>
                        <td>Timbre</td>
                        <td>{{ $document->timbre }}</td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>{{ $document->nom }}</td>
                    </tr>
                    <tr>
                        <td>Objet</td>
                        <td>{{ $document->objet }}</td>
                    </tr>
                    <tr>
                        <td>Source</td>
                        <td>{{ $document->emetteur }}</td>
                    </tr>
                    <tr>
                        <td>Date de création</td>
                        <td>{{ $document->getDateCreation()->translatedFormat("d F Y") }}</td>
                    </tr>
                    <tr>
                        <td>Nature</td>
                        <td>{{ $document->naturedocument?->nature }}</td>
                    </tr>
                </table>
            </div>
        </section>
            @if (session('success'))
                <div class="message success">
                    {{ session('success') }}
                </div>
            @endif
            @can('Demander un Prêt')
                <section class="loanRequest">
                    <div class="formContainer">
                        <h1> @if ($document->disponibilite) {{ "Procéder à une Demande de Prêt pour ce document." }} @elseif (!$document->disponibilite && $document->prete) {{ "Le dit document est actuellement en cours de prêt." }} @else {{ "Impossible de procéder à une Demande de Prêt pour ce document" }} @endif </h1>
                        <form action="{{ route('document.demande', $document) }}" method="POST" @class(['loanForm', 'disabled' => !$document->disponibilite || $document->direction_id !== auth()->user()->direction_id]) )>
                            @csrf
                            <div class="inputs firstname">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="" placeholder="Nom" value="{{ Auth::user()->nom }}" readonly>
                                @error('nom')
                                    <span style="color: red; font-size: 0.7rem">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="inputs lastname">
                                <label for="prenoms">Prénoms</label>
                                <input type="text" name="prenoms" id="" placeholder="Prénoms" value="{{ Auth::user()->prenoms }}" readonly>
                                <small></small>
                            </div>
                            <div class="inputs durée">
                                <label for="duree">Durée du prêt</label>
                                <input type="text" name="duree" id="" placeholder="Durée du prêt en jours" value="15">
                                @error('duree')
                                    <span style="color: red; font-size: 0.7rem">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="inputs">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                                @error('email')
                                    <span style="color: red; font-size: 0.7rem">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="inputs">
                                <label for="telephone">Téléphone</label>
                                <input type="text" name="telephone" id="" placeholder="Téléphone" value="+229 96909016">
                                @error('telephone')
                                    <span style="color: red; font-size: 0.7rem">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="inputs motif">
                                <label for="motif">Motif du prêt</label>
                                <textarea name="motif" id="" cols="30" rows="5" placeholder="Motif du prêt"></textarea>
                                @error('motif')
                                    <span style="color: red; font-size: 0.7rem">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <button type="submit">Soumettre</button>
                        </form>
                    </div>
                </section>
            @endcan

        {{-- <section
            style="
                width: 100%;
                height: 110Vh;
                /* background: #0ff; */
            "
        >
            <embed src="storage/documents/Machine Learning with TensorFlow.pdf" width="800" height="600" type="application/pdf" id="" >
        </section> --}}

        <div class="documentView">
            <div class="overlay"></div>
            <div class="view">
                <embed src="" width="400" type="" id="documentEmbed">
                <button class="closeDoc"><ion-icon name="close"></ion-icon></button>
            </div>
        </div>
    </section>

@endsection
