<div class="main" x-data = "{ documentsChecked : @entangle('documentsChecked').defer }">
    <div class="title">
        <p>Manage Transfer Documents</p>
        <ion-icon name="document-text"></ion-icon>
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
            <button class="filter" x-show="documentsChecked.length > 0" x-on:click="$wire.removeDocuments(documentsChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Retirer
            </button>
            <button class="add">
                <ion-icon name="create-outline"></ion-icon>
                <a href="{{ route('admin.transfert.edit', ['transfert' => $currentTransfert[0]['id']]) }}">Demande Transfert</a>
            </button>
        </div>
        <div class="search-box"  style="margin-right: 17px;">
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
                    <td>{{ $document->signature }}</td>
                    <td>{{ $document->nom }}</td>
                    <td>{{ $document->created_at }}</td>
                    <td>{{ $document->dua }}ans</td>
                    <td>
                        <button
                            class="delete"
                            routeForDeleting="{{ route('admin.document.sremove', ['document' => $document->id, 'transfert' => $currentTransfert[0]['id']]) }}">
                            <a href="" onclick="event.preventDefault()">
                                Retirez le document de la demande de transfert
                            </a>
                        </button>
                    </td>
                </tr>
                @empty
                    LA DEMANDE DE TRANSFERT NE CONTIENT AUCUN DOCUMENT
                @endforelse
            </tbody>
        </table>
        <div class="warningMessageContainer">
            <div class="overlay"></div>
            <div class="warning">
                <ion-icon name="alert-circle"></ion-icon>
                <h3>Voulez-vous vraiment retirez ce document de la demande de transfert ?</h3>
                <form action="" class="deleteForm" method="POST">
                    @csrf
                    @method('put')
                    <button type="button" class="closeWarning">Annuler</button>
                    <button type="submit" class="submitdeleteForm">Retirer</button>
                </form>
            </div>
        </div>
    </div>
</div>
