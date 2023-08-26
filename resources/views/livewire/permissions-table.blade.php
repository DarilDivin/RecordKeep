<div class="main" x-data = "{ permissionsChecked : @entangle('permissionsChecked').defer }">
    <div class="title">
        <p>Manage Permission</p>
        <ion-icon name="business"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="permissionsChecked.length > 0" x-on:click="$wire.deletedPermissions(permissionsChecked)">
                <ion-icon name="filter"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.permission.create') }}">Add Permission</a>
            </button>
        </div>
        <form action="">
            <div class="search-box" style="margin-right: 17px;">
                <input type="text" name="permission" wire:model="permission" placeholder="Nom de la permission">
                <ion-icon name="search"></ion-icon>

                @error('permission')
                    <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
                @enderror
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
                            <button class="delete">
                                <a href="{{ route('admin.permission.destroy', ['permission' => $permission->id]) }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('deleteForm{{ $permission->id }}').submit();">
                                    Supprimer
                                </a>
                                <form action="{{ route('admin.permission.destroy', ['permission' => $permission->id]) }}" method="POST" style="" id="deleteForm{{ $permission->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Permission en base de données
                @endforelse
            </tbody>
        </table>
    </div>
</div>