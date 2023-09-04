<div class="main">
    <div class="title">
        <p>Gestion des Demandes de Transferts</p>
        <ion-icon name="person"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <h3>
                @if ($transferts->count() > 0)
                    Consultez toutes les Demandes de Transferts
                @else
                    Vous n'avez reçu aucune demande de transfert
                @endif
            </h3>
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
        @foreach ($transferts as $transfert)
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
                        <p>Nombre de Documents non archivés</p>
                        <span>{{ $transfert->documents->count() }}</span>
                    </div>
                    <div class="info">
                        <p>Nombre de Documents archivés</p>
                        <span>{{ $transfert->documents->count() }}</span>
                    </div>
                </div>
                <div class="foot">
                    <a href="{{ route('manager.all-transferts.show', ['slug' => $transfert->getSlug(), 'transfert' => $transfert->id]) }}">Consulter</a>
                    <a href="">Accepter</a>
                    <button
                        class="delete"
                        routeForDeleting="{{ route('manager.all-transferts.destroy', ['transfert' => $transfert->id]) }}">
                        <a href="" onclick="event.preventDefault()">
                            Supprimer
                        </a>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    {{ $transferts->onEachSide(0)->links() }}
</div>

