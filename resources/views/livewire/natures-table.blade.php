<div class="main" x-data = "{ naturesChecked : @entangle('naturesChecked').defer }">
    <div class="title">
        <p>Gestion des Natures de Documents</p>
        <ion-icon name="person"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="naturesChecked.length > 0" x-on:click="$wire.deletedNatures(naturesChecked)" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('manager.nature.create') }}">Ajouter Nature</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="nature" wire:model="nature" placeholder="Libellé de la nature">
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
                    <x-table-header label="Nature" :direction="$orderDirection" name="nature" :field="$orderField"></x-table-header>
                    <x-table-header label="Catégorie" :direction="$orderDirection" name="categorie_id" :field="$orderField"></x-table-header>
                    <x-table-header label="Durée de Communicabilité" :direction="$orderDirection" name="duree_communicabilite" :field="$orderField"></x-table-header>
                    <x-table-header label="DUA aux Bureaux(ans)" :direction="$orderDirection" name="dua_bureaux" :field="$orderField"></x-table-header>
                    <x-table-header label="DUA au Service de Pré-Archivage(ans)" :direction="$orderDirection" name="dua_service_pre_archivage" :field="$orderField"></x-table-header>
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="created_at" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($natures as $nature)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="naturesChecked" value="{{ $nature->id }}">
                        </td>
                        <td>{{ $nature->id }}</td>
                        <td>{{ $nature->nature }}</td>
                        <td>{{ $nature->categorie->categorie }}</td>
                        <td>{{ $nature->duree_communicabilite }}ans</td>
                        <td>{{ $nature->dua_bureaux }}ans</td>
                        <td>{{ $nature->dua_service_pre_archivage }}ans</td>
                        <td>{{ $nature->created_at->translatedFormat('d F Y') }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('manager.nature.edit', ['nature' => $nature->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('manager.nature.destroy', ['nature' => $nature->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Nature de Document en base de données
                @endforelse
            </tbody>
        </table>
        {{ $natures->onEachSide(0)->links() }}
    </div>
</div>
