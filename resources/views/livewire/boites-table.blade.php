<div class="main" x-data = "{ boitesChecked : @entangle('boitesChecked').defer }">
    <div class="title">
        <p>Gestion des Boîtes d'Archives</p>
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
            <button class="filter" x-show="boitesChecked.length > 0" x-on:click="$wire.deletedBoites(boitesChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('manager.boite.create') }}">Add Archive Boite</a>
            </button>
        </div>
        <div class="check-categorie-documents" style="width: 26%;">
            <select class="inputContainer" id="rayon" wire:model="selectedRayon" name="rayon_id" style="height: 35px;">
                <option value="">Sélectionnez un rayon</option>
                @foreach ($rayons as $id => $rayon)
                    <option value="{{ $id }}">{{ $rayon }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-box" style="margin-right: 17px;">
            <input type="text" name="boite" wire:model="boite" placeholder="Libellé de la boîte">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px;">
            <input type="text" name="code" wire:model="code" placeholder="Code de la boîte">
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
                    <x-table-header label="Boîte" :direction="$orderDirection" name="libelle" :field="$orderField"></x-table-header>
                    <x-table-header label="Code" :direction="$orderDirection" name="code" :field="$orderField"></x-table-header>
                    <x-table-header label="Rayon" :direction="$orderDirection" name="rayon_rangement_id" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($boites as $boite)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="boitesChecked" value="{{ $boite->id }}">
                        </td>
                        <td>{{ $boite->id }}</td>
                        <td>{{ $boite->libelle }}</td>
                        <td>{{ $boite->code }}</td>
                        <td>{{ $boite->rayonrangement?->libelle }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('manager.boite.edit', ['boite' => $boite->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('manager.boite.destroy', ['boite' => $boite->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Boite Archive en base de données
                @endforelse
            </tbody>
        </table>
        {{ $boites->onEachSide(0)->links() }}
    </div>
</div>
