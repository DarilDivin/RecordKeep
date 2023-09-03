<div class="main" x-data = "{ chemisesChecked : @entangle('chemisesChecked').defer }">
    <div class="title">
        <p>Manage Chemises Dossiers</p>
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
            <button class="filter" x-show="chemisesChecked.length > 0" x-on:click="$wire.deletedChemises(chemisesChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.chemise.create') }}">Add Chemise Dossier</a>
            </button>
        </div>
        <div class="check-categorie-documents" style="width: 26%;">
            <select class="inputContainer" id="boite" wire:model="selectedBoite" name="boite_id" style="height: 35px;">
                <option value="">Sélectionnez une boîte</option>
                @foreach ($boites as $id => $boite)
                    <option value="{{ $id }}">{{ $boite }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-box">
            <input type="text" name="chemise" wire:model="chemise" placeholder="Libellé de la chemise">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px;">
            <input type="text" name="code" wire:model="code" placeholder="Code de la chemise">
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
                    <x-table-header label=" Chemise" :direction="$orderDirection" name="libelle" :field="$orderField"></x-table-header>
                    <x-table-header label="Code" :direction="$orderDirection" name="code" :field="$orderField"></x-table-header>
                    <x-table-header label="Boite" :direction="$orderDirection" name="boite_archive_id" :field="$orderField"></x-table-header>
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
                        <td>{{ $chemise->boitearchive?->rayonrangement?->libelle }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.chemise.edit', ['chemise' => $chemise->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.chemise.destroy', ['chemise' => $chemise->id]) }}">
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
        <div class="warningMessageContainer">
            <div class="overlay"></div>
            <div class="warning">
                <ion-icon name="alert-circle"></ion-icon>
                <h3>Voulez-vous vraiment supprimer cette chemise ?</h3>
                <form action="" class="deleteForm" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" class="closeWarning">Annuler</button>
                    <button type="submit" class="submitdeleteForm">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>