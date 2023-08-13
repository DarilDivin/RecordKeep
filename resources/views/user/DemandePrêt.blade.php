@extends('user.layouts.template')

@section('title')
    {{ $document->nom }}
@endsection

{{-- @section('style')
    @vite(['resources/css/DocumentPage.css'])
@endsection --}}

@include('user.layouts.partials.navbar')

@section('content')
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
        </div>
        <div class="infosDoc">
            <table class="table">
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

    <section class="loanRequest">
        <div class="formContainer">
            <h1>{{ $document->disponibilite ? "Procéder à une demande pour ce document" : "Impossible de procéder à une demande pour ce document" }}</h1>
            <form action="{{ route('document.demande', $document) }}" method="POST" @class(['loanForm', 'disabled' => !$document->disponibilite]) )>
                @csrf
                <div class="inputs firstname">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="" placeholder="Nom">
                    <small></small>
                </div>
                <div class="inputs lastname">
                    <label for="prenoms">Prénoms</label>
                    <input type="text" name="prenoms" id="" placeholder="Prénoms">
                    <small></small>
                </div>
                <div class="inputs durée">
                    <label for="duree">Durée du prêt</label>
                    <input type="text" name="duree" id="" placeholder="Durée du prêt en jours">
                    <small></small>
                </div>
                <div class="inputs">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="" placeholder="Email">
                    <small></small>
                </div>
                <div class="inputs">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" id="" placeholder="Téléphone">
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

    <div class="documentView">
        <div class="overlay"></div>
        <div class="view">
            <embed src="../La_culture_générale_by_Florence.pdf" width="400" type="">
            <button class="closeDoc">Fermer</button>
        </div>
    </div>
@endsection
