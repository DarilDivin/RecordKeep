<div class="main" x-data = "{ rayonsChecked : @entangle('rayonsChecked').defer }">
    <div class="title">
        <p>Gestion des Rayons de Rangement</p>
        <ion-icon name="person"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="rayonsChecked.length > 0" x-on:click="$wire.deletedRayons(rayonsChecked)" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('manager.rayon.create') }}">Ajouter Rayon</a>
            </button>
        </div>
        <div class="search-box" style="width: 22%;">
            <input type="text" name="rayon" wire:model="rayon" placeholder="Libellé du rayon">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="code" wire:model="code" placeholder="Code du rayon">
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
                    <x-table-header label="Rayon" :direction="$orderDirection" name="libelle" :field="$orderField"></x-table-header>
                    <x-table-header label="Code" :direction="$orderDirection" name="code" :field="$orderField"></x-table-header>
                    <x-table-header label="Nombre de Boîtes" :direction="$orderDirection" name="" :field="$orderField"></x-table-header>
                    <x-table-header label="Nombre de Boîtes Maximal" :direction="$orderDirection" name="boites_number_max" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($rayons as $rayon)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="rayonsChecked" value="{{ $rayon->id }}">
                        </td>
                        <td>{{ $rayon->id }}</td>
                        <td>{{ $rayon->libelle }}</td>
                        <td>{{ $rayon->code }}</td>
                        <td>{{ $rayon->boitearchives->count() }} boîte(s)</td>
                        <td>{{ $rayon->boites_number_max }} boîte(s)</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('manager.rayon.edit', ['rayon' => $rayon->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('manager.rayon.destroy', ['rayon' => $rayon->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Rayon de Rangement en base de données
                @endforelse
            </tbody>
        </table>
        {{ $rayons->onEachSide(0)->links() }}
    </div>
</div>
