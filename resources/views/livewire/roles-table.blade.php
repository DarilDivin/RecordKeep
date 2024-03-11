<div class="main" x-data = "{ rolesChecked : @entangle('rolesChecked').defer }">
    <div class="title">
        <p>Gestion des Rôles</p>
        <ion-icon name="git-compare-outline"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" id="massDelete" x-show="rolesChecked.length > 0" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.role.create') }}">Ajouter Role</a>
            </button>
        </div>

        <div class="search-box" style="margin-right: 17px; width: 22%">
            <input type="text" name="search" wire:model="role" placeholder="Nom du rôle" style="height: 35px;">
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
                    <x-table-header label="Rôle" :direction="$orderDirection" name="name" :field="$orderField"></x-table-header>
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="created_at" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="rolesChecked" value="{{ $role->id }}">
                        </td>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->created_at->translatedFormat('d F Y') }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.role.edit', ['role' => $role->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.role.destroy', ['role' => $role->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucun rôle en base de données
                @endforelse
            </tbody>
        </table>
        {{ $roles->onEachSide(0)->links() }}
    </div>
    <div class="warningMessageContainer" id="mass">
        <div class="overlay mass"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous supprimer ces utilisateurs ?</h3>
            <form class="deleteForm">
                <button type="button" class="closeWarning mass">Annuler</button>
                <button type="submit" class="submitdeleteForm mass" indexRoute="" x-on:click="$wire.deletedRoles(rolesChecked)">Supprimer</button>
            </form>
        </div>
    </div>
</div>
