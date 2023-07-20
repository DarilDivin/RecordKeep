@extends('admin.layouts.template')

@section('title')
    Dashboard-Document-Management
@endsection

@section('style')
    @vite(['resources/css/Dashboard-User-Document-Management.css', 'resources/css/Statistiques.css', 'resources/js/Dashboard-Statistiques.js'])
@endsection




@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>General Statistics</p>
                <ion-icon name="stats-chart"></ion-icon>
            </div>
            <div class="content">

                <div class="website-infos">
                    <div class="infos-bloc">
                        <div class="gauge" id="1"></div>
                        <div class="infos">
                            <h6>Users Connected</h6>
                            <p id="userConnected"></p>
                        </div>
                    </div>
                    <div class="infos-bloc">
                        <div class="gauge" id="2"></div>
                        <p>Lorem, ipsum dolor.</p>
                    </div>
                    <div class="infos-bloc">
                        <div class="gauge" id="3"></div>
                        <p>Lorem, ipsum dolor.</p>
                    </div>
                    <div class="infos-bloc">
                        <div class="gauge" id="4"></div>
                        <p>Lorem, ipsum dolor.</p>
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
                        <canvas id="donut"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


