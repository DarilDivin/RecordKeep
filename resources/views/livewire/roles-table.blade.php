<div class="main" x-data = "{ rolesChecked : @entangle('rolesChecked').defer }">
    <div class="title">
        <p>Manage Role</p>
        <ion-icon name="business"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="rolesChecked.length > 0" x-on:click="$wire.deletedRoles(rolesChecked)">
                <ion-icon name="filter"></ion-icon>
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
            @error('role')
                <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
            @enderror
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
        {{-- {{ $roles->links("shared.pagination") }} --}}
    </div>
</div>
