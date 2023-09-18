<div class="main" x-data = "{ documentsChecked : @entangle('documentsChecked').defer }">
    <div class="title">
        <p>Manage Archives Documents</p>
        <ion-icon name="folder-outline"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="add">
                <ion-icon name="arrow-redo"></ion-icon>
                <a href="{{ route('manager.transfert.all') }}">Transferts</a>
            </button>
        </div>
        <div class="search-box" style="width: 22%;">
            <input type="text" name="nom" wire:model="nom" placeholder="Nom du document">
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
                    <td></td>
                    <x-table-header label="N°" :direction="$orderDirection" name="id" :field="$orderField"></x-table-header>
                    <x-table-header label="Signature" :direction="$orderDirection" name="signature" :field="$orderField"></x-table-header>
                    <x-table-header label="Nom du Document" :direction="$orderDirection" name="nom" :field="$orderField"></x-table-header>
                    <x-table-header label="Code du Document" :direction="$orderDirection" name="code" :field="$orderField"></x-table-header>
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
                    <td>{{ $document->code }}</td>
                    <td>{{ $document->datecreation/* ->translatedFormat('d F Y') */ }}</td>
                    <td>{{ $document->dua }}ans</td>
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
