@extends('admin.layouts.template')

@section('title')
    Dashboard-User-Management
@endsection

@section('content')
    <div class="container develop">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Manage Users</p>
                <ion-icon name="person"></ion-icon>
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

            <div class="optional">
                <div class="buttons">
                    <button class="filter">
                        <ion-icon name="filter"></ion-icon>
                        Filtrer
                    </button>
                </div>
                <form action="">
                    <div class="search-box">
                        <input type="text" name="search">
                        <ion-icon name="search"></ion-icon>
                    </div>
                </form>
            </div>

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- <div class="tableau">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Demandant</td>
                            <td>Document Demandé</td>
                            <td>Durée</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($demandes as $demande)
                            <tr>
                                <td>{{ $demande->user->nom }} {{ $demande->user->prenoms }}</td>
                                <td>{{ $demande->document->nom }}</td>
                                <td>{{ $demande->duree }}</td>
                                <td>
                                    <button class="edit">
                                        <a href="">
                                            Editer
                                        </a>
                                    </button>
                                    <button class="delete">
                                        <a href="">
                                            Supprimer
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            Aucune demande en base de données
                        @endforelse
                    </tbody>
                </table>
            </div> --}}

            <div class="cardContainer">
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>
                <div class="card">
                    <div class="head">
                        <div class="titleInfos ">
                            <h3>Titre de la demande </h3>
                            <span>DPAF</span>
                        </div>
                        <span>30/05/2023</span>
                    </div>
                    <div class="body">
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                        <div class="info">
                            <p>Nbre de Documents</p>
                            <span>150</span>
                        </div>
                    </div>
                    <div class="foot">
                        <a href="#">Proceed</a>
                        <a href="#">Proceed</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
