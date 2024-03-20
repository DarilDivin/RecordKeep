<div class="main" x-data = "{ chemisesChecked : @entangle('chemisesChecked').defer }">
    <div class="title">
        <p>Gestion des Chemises Dossiers</p>
        <ion-icon name="folder-outline"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" id="massDelete" x-show="chemisesChecked.length > 0" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('manager.chemise.create') }}">Ajouter Chemise</a>
            </button>
        </div>
        <div class="check-categorie-documents" style="width: 22%;">
            <select class="inputContainer" id="boite" wire:model="selectedBoite" name="boite_id" style="height: 35px;">
                <option value="">Sélectionnez une boîte</option>
                @foreach ($boites as $boite)
                    <option value="{{ $boite->id }}">{{ $boite->libelle . ' ' . '(' . $boite->rayonrangement->code .')' }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-box" style="width: 22%;">
            <input type="text" name="chemise" wire:model="chemise" placeholder="Libellé de la chemise">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="code" wire:model="code" placeholder="Code de la chemise">
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
                    <x-table-header label=" Chemise" :direction="$orderDirection" name="libelle" :field="$orderField"></x-table-header>
                    <x-table-header label="Code" :direction="$orderDirection" name="code" :field="$orderField"></x-table-header>
                    <x-table-header label="Boite" :direction="$orderDirection" name="boite_archive_id" :field="$orderField"></x-table-header>
                    <td>Nombre de chemises maximal</td>
                    <td>Rayon</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($chemises as $chemise)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="chemisesChecked" value="{{ $chemise->id }}">
                        </td>
                        <td>{{ $chemise->id }}</td>
                        <td>{{ $chemise->libelle }}</td>
                        <td>{{ $chemise->code }}</td>
                        <td>{{ $chemise->boitearchive?->libelle }}</td>
                        <td>{{ $chemise->boitearchive?->chemises_number_max }}</td>
                        <td>{{ $chemise->boitearchive?->rayonrangement?->libelle }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('manager.chemise.edit', ['chemise' => $chemise->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('manager.chemise.destroy', ['chemise' => $chemise->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Chemise de Dossier en base de données
                @endforelse
            </tbody>
        </table>
        {{ $chemises->onEachSide(0)->links() }}
    </div>
    <div class="warningMessageContainer" id="mass">
        <div class="overlay mass"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment éffectuer cette suppression ?</h3>
            <form class="deleteForm">
                <button type="button" class="closeWarning mass">Annuler</button>
                <button type="submit" class="submitdeleteForm mass" indexRoute="" x-on:click="$wire.deletedChemises(chemisesChecked)">Supprimer</button>
            </form>
        </div>
    </div>
</div>
