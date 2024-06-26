<div class="main" x-data = "{ boitesChecked : @entangle('boitesChecked').defer }">
    <div class="title">
        <p>Gestion des Boîtes d'Archives</p>
        <ion-icon name="person"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" id="massDelete" x-show="boitesChecked.length > 0" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('manager.boite.create') }}">Ajouter Boîte</a>
            </button>
        </div>
        <div class="check-categorie-documents" style="width: 22%;">
            <select class="inputContainer" id="rayon" wire:model="selectedRayon" name="rayon_id" style="height: 35px;">
                <option value="">Sélectionnez un rayon</option>
                @foreach ($rayons as $rayon)
                    <option value="{{ $rayon->id }}">{{ $rayon->libelle . ' ' . '(' . $rayon->code .')' }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-box" style="width: 22%;">
            <input type="text" name="boite" wire:model="boite" placeholder="Libellé de la boîte">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="code" wire:model="code" placeholder="Code de la boîte">
            <ion-icon name="search"></ion-icon>
        </div>
    </div>

    @if (session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

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
                    <x-table-header label="Nombre de Chemises" :direction="$orderDirection" name="" :field="$orderField"></x-table-header>
                    <x-table-header label="Nombre de Chemises Maximal" :direction="$orderDirection" name="chemises_number_max" :field="$orderField"></x-table-header>
                    <x-table-header label="Rayon" :direction="$orderDirection" name="rayon_rangement_id" :field="$orderField"></x-table-header>
                    <td>Nombre de boîtes maximal</td>
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
                        <td>{{ $boite->chemisedossiers->count() }} chemise(s)</td>
                        <td>{{ $boite->chemises_number_max }} chemise(s)</td>
                        <td>{{ $boite->rayonrangement?->libelle }}</td>
                        <td>{{ $boite->rayonrangement?->boites_number_max }}</td>
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
    <div class="warningMessageContainer" id="mass">
        <div class="overlay mass"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment éffectuer cette suppression ?</h3>
            <form class="deleteForm">
                <button type="button" class="closeWarning mass">Annuler</button>
                <button type="submit" class="submitdeleteForm mass" indexRoute="" x-on:click="$wire.deletedBoites(boitesChecked)">Supprimer</button>
            </form>
        </div>
    </div>
</div>
