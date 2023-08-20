<div class="main">
    <div class="title">
        <p>Manage Role</p>
        <ion-icon name="business"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter">
                <ion-icon name="filter"></ion-icon>
                Filtrer
            </button>
            {{-- @if (!empty($rolesChecked))
                <button class="filter" wire:click="deletedRoles($rolesChecked)">
                    <ion-icon name="filter"></ion-icon>
                    Supprimer
                </button>
            @endif --}}
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.role.create') }}">Add Role</a>
            </button>
        </div>
        <form action="">
            <div class="search-box">
                <input type="text" name="search" wire:model="search">
                <ion-icon name="search"></ion-icon>
            </div>
        </form>
    </div>

    @if (session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @endif

    {{-- @dump($rolesChecked) --}}

    <div class="tableau">
        <table class="table">
            <thead>
                <tr>
                    <td></td>
                    <x-table-header label="N°" :direction="$orderDirection" name="id" :field="$orderField">Rôle</x-table-header>
                    <x-table-header label="Rôle" :direction="$orderDirection" name="name" :field="$orderField"></x-table-header>
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="created_at" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>
                            <input type="checkbox" name="rolesSelected[]" wire:model="rolesChecked" value="{{ $role->id }}">
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
                            <button class="delete">
                                <a href="{{ route('admin.role.destroy', ['role' => $role->id]) }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('deleteForm{{ $role->id }}').submit();">
                                    Supprimer
                                </a>
                                <form action="{{ route('admin.role.destroy', ['role' => $role->id]) }}" method="POST" style="" id="deleteForm{{ $role->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune rôle en base de données
                @endforelse
            </tbody>
        </table>
    </div>
</div>
