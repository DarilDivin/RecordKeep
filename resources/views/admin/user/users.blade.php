@extends('admin.layouts.template')

@section('title')
    Dashboard-User-Management
@endsection

{{-- @section('style')
    @vite(['resources/css/Dashboard-User-Document-Management.css', 'resources/js/Dashboard-User-Management.js'])
@endsection --}}


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
                <div class="message success">
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
                                    {{-- <button class="delete">
                                        <a href="{{ route('admin.user.destroy', ['user' => $user->id]) }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('deleteForm{{ $user->id }}').submit();">
                                            Supprimer
                                        </a>
                                        <form action="{{ route('admin.user.destroy', ['user' => $user->id]) }}" method="POST" style="" id="deleteForm{{ $user->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </button> --}}
                                    <button
                                    class="delete"
                                    routeForDeleting="{{ route('admin.user.destroy', ['user' => $user->id]) }}">
                                        <a href="" onclick="event.preventDefault()">
                                            Supprimer
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            Aucun utilisateur en base de données
                        @endforelse
                    </tbody>
                </table>

                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>

    <div class="warningMessageContainer">
        <div class="overlay"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Est vous sur de vouloir supprimer cet élément ??</h3>
            <form action="" class="deleteForm" method="POST">
                @csrf
                @method('delete')
                <button type="button" class="closeWarning">Annuler</button>
                <button type="submit" class="submitdeleteForm">Supprimer</button>
            </form>
        </div>
    </div>
@endsection
