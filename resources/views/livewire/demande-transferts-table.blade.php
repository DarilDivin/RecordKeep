<div class="main">
    <div class="title">
        <p>Gestion des Demandes de Transferts</p>
        <ion-icon name="person"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            @if (!empty($showButton))
                <button class="add">
                    <ion-icon name="create-outline"></ion-icon>
                    <a href="{{ route('manager.transfert.edit', ['transfert' => $currentTransfert[0]['id']]) }}">Demande Transfert</a>
                </button>
            @else
                <button class="add">
                    <ion-icon name="add"></ion-icon>
                    <a href="{{ route('manager.transfert.create') }}">Demande Transfert</a>
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
            <div class="card" data-label="">
                <div class="head">
                    <div class="titleInfos ">
                        <h3 title="{{ $transfert->libelle }}">{{ $transfert->libelle }}  <strong>@if($transfert->transfere) {{ 'V' }} @endif</strong>  </h3>
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
                    <a href="{{ route('manager.transfert.show', ['slug' => $transfert->getSlug(), 'transfert' => $transfert->id]) }}">Consulter</a>
                    <a href="{{ route('manager.transfert.sending', ['transfert' => $transfert->id]) }}">Transférer</a>
                    <button
                        class="delete"
                        routeForDeleting="{{ route('manager.transfert.destroy', ['transfert' => $transfert->id]) }}">
                            Annuler
                    </button>
                </div>
            </div>
        @empty
            Aucune Demande de Transfert en base de données
        @endforelse
    </div>
    {{ $transferts->onEachSide(0)->links() }}
</div>
