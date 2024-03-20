<div class="main" x-data = "{ categoriesChecked : @entangle('categoriesChecked').defer }">
    <div class="title">
        <p>Gestion des Catégories</p>
        <ion-icon name="person"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" id="massDelete" x-show="categoriesChecked.length > 0" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('manager.categorie.create') }}">Ajouter Catégorie</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="categorie" wire:model="categorie" placeholder="Nom de la categorie">
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
                    <x-table-header label="Categorie" :direction="$orderDirection" name="categorie" :field="$orderField"></x-table-header>
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="created_at" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categorie)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="categoriesChecked" value="{{ $categorie->id }}">
                        </td>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->categorie }}</td>
                        <td>{{ $categorie->created_at->translatedFormat('d F Y') }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('manager.categorie.edit', ['categorie' => $categorie->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('manager.categorie.destroy', ['categorie' => $categorie->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Catégorie en base de données
                @endforelse
            </tbody>
        </table>
        {{ $categories->onEachSide(0)->links() }}
    </div>
    <div class="warningMessageContainer" id="mass">
        <div class="overlay mass"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment éffectuer cette suppression ?</h3>
            <form class="deleteForm">
                <button type="button" class="closeWarning mass">Annuler</button>
                <button type="submit" class="submitdeleteForm mass" indexRoute="" x-on:click="$wire.deletedCategories(categoriesChecked)">Supprimer</button>
            </form>
        </div>
    </div>
</div>
