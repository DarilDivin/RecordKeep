<div class="main" x-data = "{ documentsChecked : @entangle('documentsChecked').defer }">
    <div class="title">
        <p>Liste des Documents de la Demande de Transfert</p>
        <ion-icon name="document-text"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="documentsChecked.length > 0" x-on:click="$wire.removeDocuments(documentsChecked)" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Retirer
            </button>
            <button class="filter">
                <ion-icon name="checkmark-circle-outline"></ion-icon>
                Accepter
            </button>
        </div>
        <div class="search-box"  style="margin-right: 17px; width: 22%;">
            <input type="text" name="nom" wire:model="nom" placeholder="Nom du Document">
            <ion-icon name="search"></ion-icon>
        </div>
        @error('nom')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
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
                    <x-table-header label="Signature" :direction="$orderDirection" name="signature" :field="$orderField"></x-table-header>
                    <x-table-header label="Nom du Document" :direction="$orderDirection" name="nom" :field="$orderField"></x-table-header>
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="datecreation" :field="$orderField"></x-table-header>
                    <x-table-header label="DUA" :direction="$orderDirection" name="dua" :field="$orderField"></x-table-header>
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
                    <td>{{ $document->signature }}</td>
                    <td>{{ $document->nom }}</td>
                    <td>{{ $document->created_at }}</td>
                    <td>{{ $document->dua }}ans</td>
                    <td>
                        <button class="classer"><a href="{{ route('manager.document.classement', ['document' => $document->id, 'transfert' => $transfert->id]) }}">Classer</a></button>
                        @if (!$transfert->valide)
                        <button
                            class="delete"
                            routeForDeleting="{{ route('manager.document.cremove', ['document' => $document->id, 'transfert' => $transfert->id]) }}">
                            <a href="" onclick="event.preventDefault()">
                                Retirer
                            </a>
                        </button>
                        @endif
                    </td>
                </tr>
                @empty
                    LA DEMANDE DE TRANSFERT NE CONTIENT AUCUN DOCUMENT
                @endforelse
            </tbody>
        </table>
        {{ $documents->onEachSide(0)->links() }}
    </div>
</div>
