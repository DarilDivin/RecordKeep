<div class="main">
    <div class="title">
        <p>Gestion des Demandes de Transferts</p>
        <ion-icon name="arrow-redo"></ion-icon>
    </div>

    <div class="optional">
        <div class="search-box" style="margin-right: 17px;width: 22%;">
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
            <div class="card" data-label="@if($transfert->transfere && !$transfert->valide) En attente @elseif($transfert->transfere && $transfert->valide) Terminé @else Non transféré @endif">
                <div class="head">
                    <div class="titleInfos ">
                        <h3 title="{{ $transfert->libelle }}">{{ $transfert->libelle }}</h3>
                        <span>{{ $transfert->direction->sigle }} | {{ $user->prenoms }} {{ strtoupper($user->nom) }}</span>
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
                    @if ($transfert->transferable && !$transfert->transfere)
                        <form action="{{ route('manager.transfert.sending', ['transfert' => $transfert->id]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <button style="height: 32px; font-weight: normal;">Transférer</button>
                        </form>
                    @endif
                    @if ($transfert->valide)
                        <form action="{{ route('manager.transfert.swithdraw', ['transfert' => $transfert->id]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <button style="height: 32px; font-weight: normal;">Retirer</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            Vous ne possédez aucune Demande de Transfert
        @endforelse
    </div>
    {{ $transferts->onEachSide(0)->links() }}
</div>
