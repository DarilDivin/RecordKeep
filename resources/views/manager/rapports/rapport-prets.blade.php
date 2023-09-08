@extends('admin.layouts.template')

@section('title')
    Dashboard-rapport-Management
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Rapports</p>
                <ion-icon name="document"></ion-icon>
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
                    <button class="add">
                        <ion-icon name="add"></ion-icon>
                        <a href="{{ route('admin.user.create') }}">Add User</a>
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
                            <td>Matricule</td>
                            <td>Nom</td>
                            <td>Prénoms</td>
                            <td>Rôle</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rapports as $rapport)
                            <tr>
                                <td>{{ $rapport->type }}</td>
                                <td>{{ $rapport->nom }}</td>
                                <td>{{ $rapport->prenoms }}</td>
                                <td>
                                    <div class="text-cut">
                                        {{ $rapport->role }}
                                    </div>
                                </td>
                                <td>
                                    <button class="edit">
                                        <a href="{{ route('admin.rapport.edit', ['rapport' => $rapport->id]) }}">
                                            Editer
                                        </a>
                                    </button>
                                    <button class="delete">
                                        <a href="{{ route('admin.rapport.destroy', ['rapport' => $rapport->id]) }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('deleteForm{{ $rapport->id }}').submit();">
                                            Supprimer
                                        </a>
                                        <form action="{{ route('admin.rapport.destroy', ['rapport' => $rapport->id]) }}" method="POST" style="" id="deleteForm{{ $rapport->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            Aucun rapport en base de données
                        @endforelse
                    </tbody>
                </table>
            </div> --}}

            <div class="cardContainer">
                @forelse ($rapports as $rapport)
                    <div class="card" data-label="{{ $rapport->demandepret->etat }}">
                        <div class="head">
                            <div class="titleInfos ">
                                <h3>Validation de prêt </h3>
                                <span>{{ $rapport->demandepret->duree }} jours</span>
                            </div>
                            <span>{{ $rapport->created_at }}</span>
                        </div>
                        <div class="body">
                            <div class="info">
                                <p>Signature du Document</p>
                                <span>{{ $rapport->demandepret->document->signature }}</span>
                            </div>
                            <div class="info">
                                <p>Nom du Document</p>
                                <span>{{ $rapport->demandepret->document->nom }}</span>
                            </div>
                            <div class="info">
                                <p>Nom de l'utilisateur</p>
                                <span>{{ $rapport->demandepret->user->nom }} {{ $rapport->demandepret->user->prenoms }}</span>
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
