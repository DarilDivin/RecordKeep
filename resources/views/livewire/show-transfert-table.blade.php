<div class="main" x-data = "{ documentsChecked : @entangle('documentsChecked').defer }">
    <div class="title">
        <p>Liste des Documents de la Demande de Transfert</p>
        <ion-icon name="document-text"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            @if (!$transfert->transfere)
                <button class="filter" x-show="documentsChecked.length > 0" x-on:click="$wire.removeDocuments(documentsChecked)" x-cloak>
                    <ion-icon name="trash-outline"></ion-icon>
                    Retirer
                </button>
            @endif
            @if (!empty($userTransfert))
                @if (!$transfert->transfere)
                    <button class="add">
                        <ion-icon name="create-outline"></ion-icon>
                        <a href="{{ route('manager.transfert.edit', ['transfert' => $userTransfert[0]['id']]) }}">Demande Transfert</a>
                    </button>
                @endif
            @else
                <button class="add">
                    <ion-icon name="add"></ion-icon>
                    <a href="{{ route('manager.transfert.create') }}">Demande Transfert</a>
                </button>
            @endif
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

    @if (session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

    <div class="tableau">
        <table class="table">
            <thead>
                <tr>
                    @if (!$transfert->transfere)
                        <td></td>
                    @endif
                    <x-table-header label="N°" :direction="$orderDirection" name="id" :field="$orderField"></x-table-header>
                    <x-table-header label="Signature" :direction="$orderDirection" name="signature" :field="$orderField"></x-table-header>
                    <x-table-header label="Nom du Document" :direction="$orderDirection" name="nom" :field="$orderField"></x-table-header>
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="datecreation" :field="$orderField"></x-table-header>
                    <x-table-header label="DUA" :direction="$orderDirection" name="dua" :field="$orderField"></x-table-header>
                    @if (!$transfert->transfere)
                        <td>Actions</td>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($documents as $document)
                <tr>
                    @if (!$transfert->transfere)
                        <td>
                            <input type="checkbox" x-model="documentsChecked" value="{{ $document->id }}">
                        </td>
                    @endif
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->signature }}</td>
                    <td>{{ $document->nom }}</td>
                    <td>{{ $document->getDateCreation()->translatedFormat('d F Y') }}</td>
                    <td>{{ $document->dua }}ans</td>
                    @if (!$transfert->transfere)
                        <td>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('manager.document.sremove', ['document' => $document->id, 'transfert' => $userTransfert[0]['id']]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Retirer
                                </a>
                            </button>
                        </td>
                    @endif
                </tr>
                @empty
                    LA DEMANDE DE TRANSFERT NE CONTIENT AUCUN DOCUMENT
                @endforelse
            </tbody>
        </table>
        {{ $documents->onEachSide(0)->links() }}
    </div>
</div>
