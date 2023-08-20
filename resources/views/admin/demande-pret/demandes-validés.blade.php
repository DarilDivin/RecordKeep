@extends('admin.layouts.template')

@section('title')
    Dashboard-User-Management
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Manage Users</p>
                <ion-icon name="person"></ion-icon>
            </div>

            <div class="optional">
                <div class="buttons">
                    <button class="filter">
                        <ion-icon name="filter"></ion-icon>
                        Filtrer
                    </button>
                    {{-- <button class="add">
                        <ion-icon name="add"></ion-icon>
                        <a href="{{ route('admin.user.create') }}">Add User</a>
                    </button> --}}
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

            <div class="tableau">
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
            </div>
        </div>
    </div>
@endsection
