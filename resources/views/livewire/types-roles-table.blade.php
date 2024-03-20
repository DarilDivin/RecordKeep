<div class="main" x-data = "{ typesChecked : @entangle('typesChecked').defer }">
    <div class="title">
        <p>Gestion des Types de Rôles</p>
        <ion-icon name="person"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" id="massDelete" x-show="typesChecked.length > 0" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.type-role.create') }}">Ajouter Type Role</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%">
            <input type="text" name="libelle" wire:model="libelle" placeholder="Libellé du type de rôle" style="height: 35px;">
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
                    <x-table-header label="Type de Rôle" :direction="$orderDirection" name="libelle" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($typeroles as $typerole)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="typesChecked" value="{{ $typerole->id }}">
                        </td>
                        <td>{{ $typerole->id }}</td>
                        <td>{{ $typerole->libelle }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.type-role.edit', ['type_role' => $typerole->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.type-role.destroy', ['type_role' => $typerole->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucun Type de Rôle en en base de données
                @endforelse
            </tbody>
        </table>
       {{ $typeroles->onEachSide(0)->links() }}
    </div>
    <div class="warningMessageContainer" id="mass">
        <div class="overlay mass"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment éffectuer cette suppression ?</h3>
            <form class="deleteForm">
                <button type="button" class="closeWarning mass">Annuler</button>
                <button type="submit" class="submitdeleteForm mass" indexRoute="" x-on:click="$wire.deletedTypesRoles(typesChecked)">Supprimer</button>
            </form>
        </div>
    </div>
</div>
