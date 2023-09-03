<div class="main">
    <div class="title">
        <p>Manage Demande Transfert</p>
        <ion-icon name="person"></ion-icon>
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
            @if (!empty($showButton))
                <button class="add">
                    <ion-icon name="create-outline"></ion-icon>
                    <a href="{{ route('admin.transfert.edit', ['transfert' => $currentTransfert[0]['id']]) }}">Demande Transfert</a>
                </button>
            @else
                <button class="add">
                    <ion-icon name="add"></ion-icon>
                    <a href="{{ route('admin.transfert.create') }}">Demande Transfert</a>
                </button>
            @endif
        </div>
        <div class="search-box">
            <input type="text" name="libelle" wire:model="libelle" placeholder="Libellé de la Demande">
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

    <div class="cardContainer">
        @forelse ($transferts as $transfert)
            <div class="card">
                <div class="head">
                    <div class="titleInfos ">
                        <h3>{{ $transfert->libelle }}</h3>
                        <span>DPAF</span>
                    </div>
                    <span>{{ $transfert->created_at->translatedFormat('d/F/Y') }}</span>
                </div>
                <div class="body">
                    <div class="info">
                        <p>Nombre de Documents</p>
                        <span>{{ $transfert->documents->count() }}</span>
                    </div>
                </div>
                <div class="foot">
                    <a href="{{ route('admin.transfert.show', ['slug' => $transfert->getSlug(), 'transfert' => $transfert->id]) }}">Consulter</a>
                    <a href="{{ route('admin.transfert.valid', ['transfert' => $transfert->id]) }}">Transférer</a>
                    <button
                        class="delete"
                        routeForDeleting="{{ route('admin.transfert.destroy', ['transfert' => $transfert->id]) }}">
                        <a href="" onclick="event.preventDefault()">
                            Annuler
                        </a>
                    </button>
                </div>
            </div>
        @empty
            Aucune Demande de Transfert en base de données
        @endforelse
    </div>
    <div class="warningMessageContainer">
        <div class="overlay"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Confirmer l'annulation de cette demande de transfert ?</h3>
            <form action="" class="deleteForm" method="POST">
                @csrf
                @method('delete')
                <button type="button" class="closeWarning">Annuler</button>
                <button type="submit" class="submitdeleteForm">Confirmer</button>
            </form>
        </div>
    </div>
</div>
