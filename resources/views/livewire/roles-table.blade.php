<div class="main" x-data = "{ rolesChecked : @entangle('rolesChecked').defer }">
    <div class="title">
        <p>Gestion des Rôles</p>
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
            <button class="filter" x-show="rolesChecked.length > 0" x-on:click="$wire.deletedRoles(rolesChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.role.create') }}">Add Role</a>
            </button>
        </div>

        <div class="search-box" style="margin-right: 17px;">
            <input type="text" name="search" wire:model="role" placeholder="Nom du rôle">
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
                        <td>{{ $role->created_at->translatedFormat('d M Y') }}</td>
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
</div>
