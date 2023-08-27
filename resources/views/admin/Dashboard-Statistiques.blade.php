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
            <div class="content">

                <div class="website-infos">

                    <div class="infos-bloc">
                        <div class="infos-title">
                            Documents
                        </div>
                        <div class="infos">
                            <div class="info info-total">
                                <p>Total</p>
                                <h5>300</h5>
                            </div>
                            <div class="info">
                                <h5>Archivé</h5>
                                <div class="gauge" id="1"></div>
                            </div>
                            <div class="info">
                                <h5>Prêté</h5>
                                <div class="gauge" id="2"></div>
                            </div>
                            <div class="info">
                                <h5>Téléchargé</h5>
                                <div class="gauge" id="3"></div>
                            </div>
                            <div class="info">
                                <h5>Disponible</h5>
                                <div class="gauge" id="4"></div>
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
                                <h5>300</h5>
                            </div>
                            <div class="info donut">
                                <canvas id="donut"></canvas>
                            </div>
                            <div class="info">
                                <h5>Connecté</h5>
                                <div class="gauge" id="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="statistics-chart">
                    <div class="member-connected-per-month">
                        <canvas id="member-connected-per-month"></canvas>
                    </div>
                    <div class="donut-graph">
                        <div class="descript">
                        <h5>Rprésentation des Utilisateurs</h5>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        </p>
                        </div>
                        <canvas id="donuto"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


