<div class="main" x-data = "{ documentsChecked : @entangle('documentsChecked').defer }">
    <div class="title">
        <p>Liste des Documents de la Demande de Transfert</p>
        <ion-icon name="document-text"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter"  x-on:click="$wire.showBordereauForm">
                <ion-icon name="checkmark-circle-outline"></ion-icon>
                @if (!$transfert->valide)
                    Accepter
                @else
                    Générer Bordereau
                @endif
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

    @if (session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

    <div class="tableau">
        <table class="table">
            <thead>
                <tr>
                    <x-table-header label="N°" :direction="$orderDirection" name="id" :field="$orderField"></x-table-header>
                    <x-table-header label="Timbre" :direction="$orderDirection" name="timbre" :field="$orderField"></x-table-header>
                    <x-table-header label="Nom du Document" :direction="$orderDirection" name="nom" :field="$orderField"></x-table-header>
                    <x-table-header label="Nature du Document" :direction="$orderDirection" name="nature" :field="$orderField"></x-table-header>
                    <td>DUA aux bureaux</td>
                    <td>DUA au Service de Pré-Archivage</td>
                    <x-table-header label="Communicable" :direction="$orderDirection" name="communicable" :field="$orderField"></x-table-header>
                    <x-table-header label="Date de Création" :direction="$orderDirection" name="datecreation" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($documents as $document)
                <tr>
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->timbre }}</td>
                    <td>{{ $document->nom }}</td>
                    <td>{{ $document->naturedocument->nature }}</td>
                    <td>{{ $document->naturedocument->dua_bureaux }}ans</td>
                    <td>{{ $document->naturedocument->dua_service_pre_archivage }}ans</td>
                    <td>{{ $document->communicable ? "Oui" : "Non" }}</td>
                    <td>{{ $document->getDateCreation()->translatedFormat('d F Y') }}</td>
                    <td>
                        <button class="classer"><a href="{{ route('manager.document.classement', ['document' => $document->id, 'transfert' => $transfert->id]) }}">Classer</a></button>
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
