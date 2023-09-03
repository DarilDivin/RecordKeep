<div class="main" x-data = "{ usersChecked : @entangle('usersChecked').defer }">
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
            <button class="filter" x-show="usersChecked.length > 0" x-on:click="$wire.deletedUsers(usersChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.user.create') }}">Add User</a>
            </button>
        </div>
        <div class="search-box" style="width: 23%;">
            <input type="text" name="nom" wire:model="nom" placeholder="Nom de l'utilisateur">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 23%;"">
            <input type="text" name="matricule" wire:model="matricule" placeholder="Matricule {{-- de l'utilisateur --}}">
            <ion-icon name="search"></ion-icon>
        </div>
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
                    <td></td>
                    <x-table-header label="N°" :direction="$orderDirection" name="id" :field="$orderField"></x-table-header>
                    <x-table-header label="Matricule" :direction="$orderDirection" name="matricule" :field="$orderField"></x-table-header>
                    <x-table-header label="Nom" :direction="$orderDirection" name="nom" :field="$orderField"></x-table-header>
                    <x-table-header label="Prénom" :direction="$orderDirection" name="prenoms" :field="$orderField"></x-table-header>
                    <x-table-header label="Fonction" :direction="$orderDirection" name="fonction_id" :field="$orderField"></x-table-header>
                    <td>Rôle</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="usersChecked" value="{{ $user->id }}">
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->matricule }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenoms }}</td>
                        <td>{{ $user->fonction?->fonction }}</td>
                        <td> {{ $user->role?->name }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                                    Editer
                                </a>
                            </button>
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

        <div class="warningMessageContainer">
            <div class="overlay"></div>
            <div class="warning">
                <ion-icon name="alert-circle"></ion-icon>
                <h3>Voulez-vous supprimer cet utilisateur ?</h3>
                <form action="" class="deleteForm" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" class="closeWarning">Annuler</button>
                    <button type="submit" class="submitdeleteForm">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
