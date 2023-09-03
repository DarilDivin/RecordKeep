<div class="main" x-data = "{ typesChecked : @entangle('typesChecked').defer }">
    <div class="title">
        <p>Manage Type Of Role</p>
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
            <button class="filter" x-show="typesChecked.length > 0" x-on:click="$wire.deletedTypesRoles(typesChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.type-role.create') }}">Add Type Role</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px;">
            <input type="text" name="libelle" wire:model="libelle" placeholder="Libellé du type de rôle">
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
        <div class="warningMessageContainer">
            <div class="overlay"></div>
            <div class="warning">
                <ion-icon name="alert-circle"></ion-icon>
                <h3>Voulez-vous vraiment supprimer ce type de rôle ?</h3>
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
