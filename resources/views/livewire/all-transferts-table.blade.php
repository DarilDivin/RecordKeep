<div class="main">
    <div class="title">
        <p>Gestion des Demandes de Transferts</p>
        <ion-icon name="arrow-redo"></ion-icon>
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
        <div class="search-box" style="margin-right: 17px; width: 22%;">
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
            @php
                $documents = Document::all()
            @endphp
            @dd($documents)
            <div class="card"  data-label="Transféré{{-- @if($transfert->transfere && !$transfert->valide) En attente @elseif($transfert->transfere && $transfert->valide) Terminé @else Non transféré @endif --}}">
                <div class="head">
                    <div class="titleInfos ">
                        <h3>{{ $transfert->libelle }}</h3>
                        <span>{{ $transfert->direction->sigle }} | {{ $transfertUser->prenoms }} {{ strtoupper($transfertUser->nom) }}</span>
                    </div>
                    <span>{{ $transfert->created_at->translatedFormat('d/F/Y') }}</span>
                </div>
                <div class="body">
                    <div class="info">
                        <p>Nombre de Documents total</p>
                        <span>{{ $transfert->documents->count() }}</span>
                    </div>
                    <div class="info">
                        <p>Nombre de Documents non archivés</p>
                        <span>{{ $transfert->documents->where('archive', 0)->count() }}</span>
                    </div>
                    <div class="info">
                        <p>Nombre de Documents archivés</p>
                        <span>{{ $transfert->documents->where('archive', 1)->count() }}</span>
                    </div>
                </div>
                <div class="foot">
                    @if ($transfert->documents->where('archive', 0)->count() > 0)
                        <a href="{{ route('manager.transfert.one', ['slug' => $transfert->getSlug(), 'transfert' => $transfert->id]) }}">Consulter</a>
                    @endif
                    @if ($transfert->documents->count() > 0)
                        <a href="{{ route('manager.transfert.bordereau-form', ['transfert' => $transfert->id]) }}">{{ $transfert->valide ? 'Générer Bordereau' : 'Accepter' }}</a>
                    @endif
                    @if ($transfert->valide && $transfert->documents->where('archive', 0)->count() === 0)
                        <form action="{{ route('manager.transfert.rocl', ['transfert' => $transfert->id]) }}">
                            @csrf
                            @method('patch')
                            <button style="height: 32px; font-weight: normal;">Retirer</button>
                        </form>
                    @endif
                    @if (!$transfert->valide)
                        <button
                            class="delete"
                            routeForDeleting="{{ route('manager.transfert.off', ['transfert' => $transfert->id]) }}" style="height: 30px; font-size: 14px;">
                            Annuler
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    {{ $transferts->onEachSide(0)->links() }}
</div>

