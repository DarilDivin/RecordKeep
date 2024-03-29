<div class="main" x-data = "{ documentsChecked : @entangle('documentsChecked').defer }">
    <div class="title">
        <p>Manage Archives Documents</p>
        <ion-icon name="document-attach-outline"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="add">
                <ion-icon name="arrow-redo"></ion-icon>
                <a href="{{ route('manager.transfert.all') }}">Transferts</a>
            </button>
        </div>
        <div class="search-box" style="width: 22%;">
            <input type="text" name="nom" wire:model="nom" placeholder="Objet du document">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;">
            <input type="text" name="code" wire:model="code" placeholder="Code du document">
            <ion-icon name="search"></ion-icon>
        </div>
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
                    <x-table-header label="Référence" :direction="$orderDirection" name="reference" :field="$orderField"></x-table-header>
                    <x-table-header label="Objet" :direction="$orderDirection" name="objet" :field="$orderField"></x-table-header>
                    <x-table-header label="Code du Document" :direction="$orderDirection" name="code" :field="$orderField"></x-table-header>
                    <x-table-header label="Nature du Document" :direction="$orderDirection" name="nature" :field="$orderField"></x-table-header>
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
                    <td>{{ $document->reference }}</td>
                    <td>{{ $document->objet }}</td>
                    <td>{{ $document->code }}</td>
                    <td>{{ $document->naturedocument->nature }}</td>
                    <td>{{ $document->naturedocument->dua_service_pre_archivage }}ans</td>
                    <td>{{ $document->communicable ? "Oui" : "Non" }}</td>
                    <td>{{ $document->getDateCreation()->translatedFormat('d F Y') }}</td>
                    <td>
                        <button class="classer"><a href="{{ route('manager.document.classement', ['document' => $document->id, 'transfert' => $document->demandetransfert->id]) }}">Reclasser</a></button>
                    </td>
                </tr>
                @empty
                    AUCUN DOCUMENT CLASSÉ DISPONIBLE
                @endforelse
            </tbody>
        </table>
        {{ $documents->onEachSide(0)->links() }}
    </div>
</div>
