@extends('admin.layouts.template')

@section('title')
    Dashboard-Document-Management
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Statistiques Génerales</p>
                <ion-icon name="stats-chart"></ion-icon>
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

            <div class="content">

                <div class="website-infos">

                    <div class="infos-bloc">
                        <div class="infos-title">
                            Documents
                        </div>
                        <div class="infos">
                            <div class="info info-total">
                                <p>Total</p>
                                <h5>{{ $nbrdocument }}</h5>
                            </div>
                            <div class="info">
                                <h5>Archivé : {{ $nbrDocumentArchivé }}</h5>
                                <div class="gauge" id="1" data-pourcentage-archive="{{ json_encode($pourcentagedocumentArchivé) }}"></div>
                            </div>
                            <div class="info">
                                <h5>Prêté : {{ $nbrDocumentPreté }}</h5>
                                <div class="gauge" id="2" data-pourcentage-prete="{{ json_encode($pourcentagedocumentPreté) }}"></div>
                            </div>
                            <div class="info">
                                <h5>Téléchargé : {{ $nbrDocumentTéléchargé }}</h5>
                                <div class="gauge" id="3" data-pourcentage-telecharge="{{ json_encode($pourcentagedocumentTéléchargé) }}"></div>
                            </div>
                            <div class="info">
                                <h5>Disponible : {{ $nbrDocumentDispo }}</h5>
                                <div class="gauge" id="4" data-pourcentage-dispo="{{ json_encode($pourcentagedocumentDispo) }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="infos-bloc">
                        <div class="infos-title">
                            Utilisateurs
                        </div>
                        <div class="infos">
                            <div class="info info-total">
                                <p>Total</p>
                                <h5>{{ $nbruser }}</h5>
                            </div>
                            <div class="info donut" data-user-donut="{{ json_encode($UserDonut) }}" id="donutContainer">
                                <canvas id="donut"></canvas>
                            </div>
                            <div class="info">
                                <h5>Authentifié : {{ $nbrUtilisateursAuthentifies }} / {{ $nbruser }}</h5>
                                <div class="gauge" id="5" data-pourcentage-utilisateur-auth="{{ json_encode($pourcentageUtilisateursAuthentifies) }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="statistics-chart">
                    <div class="member-connected-per-month" data="{{ json_encode($formattedData) }}" id="chart">
                        <canvas id="member-connected-per-month"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


