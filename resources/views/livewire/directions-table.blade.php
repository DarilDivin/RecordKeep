<div class="main" x-data = "{ directionsChecked : @entangle('directionsChecked').defer }">
    <div class="title">
        <p>Gestion des Directions</p>
        <ion-icon name="business"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="directionsChecked.length > 0" x-on:click="$wire.deletedDirections(directionsChecked)" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.direction.create') }}">Add Direction</a>
            </button>
        </div>
        <div class="search-box" style="width: 22%;">
            <input type="text" name="direction" wire:model="direction" placeholder="Nom de la direction">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%">
            <input type="text" name="sigle" wire:model="sigle" placeholder="Sigle de la direction">
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
                    <x-table-header label="Direction" :direction="$orderDirection" name="direction" :field="$orderField"></x-table-header>
                    <x-table-header label="Sigle" :direction="$orderDirection" name="sigle" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($directions as $direction)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="directionsChecked" value="{{ $direction->id }}">
                        </td>
                        <td>{{ $direction->id }}</td>
                        <td>{{ $direction->direction }}</td>
                        <td>{{ $direction->sigle }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.direction.edit', ['direction' => $direction->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.direction.destroy', ['direction' => $direction->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune direction en base de données
                @endforelse
            </tbody>
        </table>
        {{ $directions->onEachSide(0)->links() }}
    </div>
</div>
