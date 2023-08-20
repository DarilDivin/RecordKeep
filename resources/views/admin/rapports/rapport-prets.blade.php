@extends('admin.layouts.template')

@section('title')
    Dashboard-User-Management
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.partials.sidebar')

        <div class="main">
            <div class="title">
                <p>Rapports</p>
                <ion-icon name="person"></ion-icon>
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

            <div class="tableau">
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
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->matricule }}</td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenoms }}</td>
                                <td>
                                    <div class="text-cut">
                                        {{ $user->role }}
                                    </div>
                                </td>
                                <td>
                                    <button class="edit">
                                        <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                                            Editer
                                        </a>
                                    </button>
                                    <button class="delete">
                                        <a href="{{ route('admin.user.destroy', ['user' => $user->id]) }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('deleteForm{{ $user->id }}').submit();">
                                            Supprimer
                                        </a>
                                        <form action="{{ route('admin.user.destroy', ['user' => $user->id]) }}" method="POST" style="" id="deleteForm{{ $user->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            Aucun utilisateur en base de données
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
