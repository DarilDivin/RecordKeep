{{-- @extends('admin.layouts.template')

@section('title')
    Dashboard-User-Management
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Rapport Généré</p>
                <ion-icon name="document-outline"></ion-icon>
            </div> --}}
            <style>
                * {
                    padding: 0;
                    margin: 0;
                    box-sizing: border-box;
                }
                .rapportContainer {
                    width: 100%;
                    height: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: #00f;

                }

                .rapportContainer .rapport {
                    width: 100%;
                    height: auto;
                    background-color: #fff;
                    color:#000;
                    /* padding: 0 15px; */
                    display:flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: flex-start;
                }

                .rapportContainer .rapport h1 {
                    /* width: 100%; */
                    /* background: #f0f; */
                    text-align: center;
                }
            </style>



            <div class="rapportContainer">
                <div class="rapport">
                    <h1>Rapport de {{ $rapport->type }} de prêt </h1>
                    <p><strong>Signature du document :</strong> {{ $rapport->demandePret->document->signature }}</p>
                    <p><strong>Nom du document :</strong> {{ $rapport->demandePret->document->nom }}</p>
                    <p><strong>Nom du prêteur :</strong> {{ $rapport->demandePret->user->nom }}</p>
                    <p><strong>Prénoms du prêteur :</strong> {{ $rapport->demandePret->user->prenoms }}</p>
                    <p><strong>Observation :</strong><br> {{ $rapport->observation }}</p>
                    <p><strong>Etat du doc :</strong> {{ $rapport->etat_doc }}</p><br>
                </div>
            </div>
        {{-- </div>
    </div>
@endsection --}}
