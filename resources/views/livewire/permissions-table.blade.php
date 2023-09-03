<div class="main" x-data = "{ permissionsChecked : @entangle('permissionsChecked').defer }">
    <div class="title">
        <p>Manage Permission</p>
        <ion-icon name="business"></ion-icon>
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
            <button class="filter" x-show="permissionsChecked.length > 0" x-on:click="$wire.deletedPermissions(permissionsChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.permission.create') }}">Add Permission</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px;">
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
                        <td>{{ $permission->created_at->translatedFormat('d M Y') }}</td>
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
        <div class="warningMessageContainer">
            <div class="overlay"></div>
            <div class="warning">
                <ion-icon name="alert-circle"></ion-icon>
                <h3>Voulez-vous vraiment supprimer cette permission ?</h3>
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
