<div class="main" x-data = "{ fonctionsChecked : @entangle('fonctionsChecked').defer }">
    <div class="title">
        <p>Gestion des Fonctions</p>
        <ion-icon name="briefcase-outline"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" id="massDelete" x-show="fonctionsChecked.length > 0" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.fonction.create') }}">Ajouter Fonction</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="fonction" wire:model="fonction" placeholder="Nom de la fonction" style="height: 35px;">
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
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="created_at" :field="$orderField"></x-table-header>
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
                        <td>{{ $fonction->created_at->translatedFormat('d F Y') }}</td>
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

    <div class="warningMessageContainer" id="mass">
        <div class="overlay mass"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment éffectuer cette suppression ?</h3>
            <form class="deleteForm">
                <button type="button" class="closeWarning mass">Annuler</button>
                <button type="submit" class="submitdeleteForm mass" indexRoute="" x-on:click="$wire.deletedFonctions(fonctionsChecked)">Supprimer</button>
            </form>
        </div>
    </div>
</div>
