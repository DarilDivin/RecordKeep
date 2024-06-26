<div class="main" x-data = "{ permissionsChecked : @entangle('permissionsChecked').defer }">
    <div class="title">
        <p>Gestion des Permissions</p>
        <ion-icon name="business"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" id="massDelete" x-show="permissionsChecked.length > 0" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.permission.create') }}">Ajouter Permission</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="permission" wire:model="permission" placeholder="Nom de la permission">
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
                    <x-table-header label="N°" :direction="$orderDirection" :field="$orderField" name="id"></x-table-header>
                    <x-table-header label="Permission" :direction="$orderDirection" :field="$orderField" name="name"></x-table-header>
                    <x-table-header label="Date de Création" :direction="$orderDirection" :field="$orderField" name="created_at"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $permission)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{ $permission->id }}" x-model = "permissionsChecked">
                        </td>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->created_at->translatedFormat('d F Y') }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.permission.edit', ['permission' => $permission->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.permission.destroy', ['permission' => $permission->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Permission en base de données
                @endforelse
            </tbody>
        </table>
        {{ $permissions->onEachSide(0)->links() }}
    </div>
    <div class="warningMessageContainer" id="mass">
        <div class="overlay mass"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment éffectuer cette suppression ?</h3>
            <form class="deleteForm">
                <button type="button" class="closeWarning mass">Annuler</button>
                <button type="submit" class="submitdeleteForm mass" indexRoute="" x-on:click="$wire.deletedPermissions(permissionsChecked)">Supprimer</button>
            </form>
        </div>
    </div>
</div>
