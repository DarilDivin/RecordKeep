<div class="main" x-data = "{ fonctionsChecked : @entangle('fonctionsChecked').defer }">
    <div class="title">
        <p>Gestion des Fonctions</p>
        <ion-icon name="briefcase-outline"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="fonctionsChecked.length > 0" x-on:click="$wire.deletedFonctions(fonctionsChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.fonction.create') }}">Add Fonction</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="fonction" wire:model="fonction" placeholder="Nom de la fonction">
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
                    <x-table-header label="Fonction" :direction="$orderDirection" name="fonction" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($fonctions as $fonction)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="fonctionsChecked" value="{{ $fonction->id }}">
                        </td>
                        <td>{{ $fonction->id }}</td>
                        <td>{{ $fonction->fonction }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.fonction.edit', ['fonction' => $fonction->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.fonction.destroy', ['fonction' => $fonction->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune fonction en base de données
                @endforelse
            </tbody>
        </table>
        {{ $fonctions->onEachSide(0)->links() }}
    </div>
</div>
