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
                    <button class="consult" data-document-link="storage/{{ $document->document }}">
                        <ion-icon name="eye-outline"></ion-icon>
                        <p>Consulter</p>
                </button>
                <button class="download">
                    <a href="{{ route('document.download', ['document' => $document]) }}">
                        <ion-icon name="download"></ion-icon>
                        <p>Télécharger</p>
                    </a>
                </button>
                </div>
            </div>
            <div class="infosDoc">
                <table class="table">
                    <tr>
                        <td>Signature</td>
                        <td>{{ $document->signature }}</td>
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
                        <td>{{ $document->source }}</td>
                    </tr>
                    <tr>
                        <td>Date du courier</td>
                        <td>{{ $document->datecreation }}</td>
                    </tr>
                    <tr>
                        <td>Nature</td>
                        <td>{{ $document->naturedocument?->nature }}</td>
                    </tr>
                </table>
            </div>
        </section>

        @can('Gestion des Documents')
            <section class="plusInfos">
                <table class="table">
                    <tr>
                        <td>Identifiant</td>
                        <td>{{ $document->id }}</td>
                    </tr>
                    <tr>
                        <td>Code</td>
                        <td>{{ $document->code }}</td>
                    </tr>
                    <tr>
                        <td>DUA</td>
                        <td>{{ $document->dua }} ans</td>
                    </tr>
                    <tr>
                        <td>Emetteur</td>
                        <td>{{ $document->emetteur }}</td>
                    </tr>
                    <tr>
                        <td>Récepteur</td>
                        <td>{{ $document->recepteur }}</td>
                    </tr>
                    <tr>
                        <td>Mots clés</td>
                        <td>{{ $document->motclefs }}</td>
                    </tr>

                </table>
                <div class="vertical-line"></div>
                <table class="table">
                    <tr>
                        <td>Direction</td>
                        <td>{{ $document->direction->direction }}</td>
                    </tr>
                    <tr>
                        <td>Service</td>
                        <td>{{ $document->service->service }}</td>
                    </tr>
                    <tr>
                        <td>Division</td>
                        <td>{{ $document->division->division }}</td>
                    </tr>
                    <tr>
                        <td>Chemise</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Boite</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Rayon</td>
                        <td>-</td>
                    </tr>
                </table>
            </section>
        @endcan


        @can('Demander un Prêt')
            <section class="loanRequest">
                <div class="formContainer">

                    @if (session('success'))
                        <div class="message success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h1>{{ $document->disponibilite ? "Procéder à une demande pour ce document" : "Impossible de procéder à une demande pour ce document" }}</h1>
                    <form action="{{ route('document.demande', $document) }}" method="POST" @class(['loanForm', 'disabled' => !$document->disponibilite]) )>
                        @csrf
                        <div class="inputs firstname">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="" placeholder="Nom" value="{{ Auth::user()->nom }}" readonly>
                            <small></small>
                        </div>
                        <div class="inputs lastname">
                            <label for="prenoms">Prénoms</label>
                            <input type="text" name="prenoms" id="" placeholder="Prénoms" value="{{ Auth::user()->prenoms }}" readonly>
                            <small></small>
                        </div>
                        <div class="inputs durée">
                            <label for="duree">Durée du prêt</label>
                            <input type="text" name="duree" id="" placeholder="Durée du prêt en jours" value="15">
                            <small></small>
                        </div>
                        <div class="inputs">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                            <small></small>
                        </div>
                        <div class="inputs">
                            <label for="telephone">Téléphone</label>
                            <input type="text" name="telephone" id="" placeholder="Téléphone" value="55555555">
                            <small></small>
                        </div>
                        <div class="inputs motif">
                            <label for="motif">Motif du prêt</label>
                            <textarea name="motif" id="" cols="30" rows="5" placeholder="Motif du prêt"></textarea>
                            <small></small>
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
