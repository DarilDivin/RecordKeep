<div x-data = "{
    documentsChecked : @entangle('documentsChecked').defer,
    showModal : 0
    }">
    <div class="optional">
        <div class="buttons">
            <button class="filter deleteMultiple" x-show="documentsChecked.length > 0" x-on:click="$wire.destroyDocuments(documentsChecked)" x-cloak>
                <ion-icon name="trash"></ion-icon>
                Supprimer
            </button>
            {{-- <button class="filter" x-show="documentsChecked.length > 0" x-on:click="$wire.createTransfertDocuments(documentsChecked)" x-cloak>
                <ion-icon name="add"></ion-icon>
                Demande Transfert
            </button> --}}
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('manager.document.create') }}">Ajouter Document</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="nom" placeholder="Nom du document" wire:model="nom">
            <ion-icon name="search"></ion-icon>
        </div>
        {{-- <div class="search-box">
            <input type="text" name="datecreation" placeholder="12-12-2023" wire:model="datecreation">
            <ion-icon name="search"></ion-icon>
            @error('datecreation')
                <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
            @enderror
        </div> --}}
    </div>

    @if (session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

    <div class="tableau">
        <table class="table">
            <thead>
                <tr>
                    <td></td>
                    <x-table-header label="N°" :direction="$orderDirection" name="id" :field="$orderField"></x-table-header>
                    <x-table-header label="Timbre" :direction="$orderDirection" name="timbre" :field="$orderField"></x-table-header>
                    <x-table-header label="Nom du Document" :direction="$orderDirection" name="nom" :field="$orderField"></x-table-header>
                    <td>DUA(ans)</td>
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="datecreation" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($documents as $document)
                <tr>
                    <td>
                        <input type="checkbox" x-model="documentsChecked" value="{{ $document->id }}">
                    </td>
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->timbre }}</td>
                    <td>{{ $document->nom }}</td>
                    <td>{{ $document->naturedocument->dua }}ans</td>
                    <td>{{ $document->getDateCreation()->translatedFormat('d F Y') }}</td>
                    <td>
                        <button class="viewInfo"
                                data-document="{{ json_encode($document) }}"
                                data-document-nature="{{ json_encode($document->naturedocument->nature) }}"
                                data-document-direction="{{ json_encode(Str::limit($document->direction->direction, 40, '...')) }}"
                                data-document-division="{{ json_encode(Str::limit($document?->division?->division, 40, '...')) }}"
                                data-document-service="{{ json_encode(Str::limit($document?->service?->service, 40, '...')) }}"
                                data-document-chemise="{{ json_encode($document?->chemisedossier?->code) }}"
                                data-document-boite="{{ json_encode($document?->chemisedossier?->boitearchive?->code) }}"
                                data-document-rayon="{{ json_encode($document?->chemisedossier?->boitearchive?->rayonrangement?->code) }}"
                                data-document-date="{{ json_encode($document->getDateCreation()->translatedFormat('d F Y')) }}"
                                >
                            <a href="" onclick="event.preventDefault()">Infos</a>
                        </button>
                        <button class="edit"><a href="{{ route('manager.document.edit', ['document' => $document->id]) }}">Éditer</a></button>
                        <button
                        class="delete"
                        routeForDeleting="{{ route('manager.document.destroy', ['document' => $document->id]) }}">
                            <a href="" onclick="event.preventDefault()">
                                Supprimer
                            </a>
                        </button>
                    </td>
                </tr>
                @empty
                    AUCUN DOCUMENT EN BASE DE DONNÉES
                @endforelse
            </tbody>
        </table>
        {{ $documents->onEachSide(0)->links() }}
    </div>
</div>
{{-- <div class="warningMessageContainer" id="Formdeletemultiple" x-show="showModal = 1">
    <div class="overlay"></div>
    <div class="warning">
        <ion-icon name="alert-circle"></ion-icon>
        <h3>Voulez-vous vraiment supprimer ces document ?</h3>
        <form action="" class="deleteFormMultiple" method="POST">
            @csrf
            @method('delete')
            <button type="button" class="closeWarning" x-on:click="showModal=0">Annuler</button>
            <button type="submit" class="submitdeleteFormMultiple" x-on:click="$wire.destroyDocuments(documentsChecked), showModal=0">Supprimer</button>
        </form>
    </div>
</div> --}}
