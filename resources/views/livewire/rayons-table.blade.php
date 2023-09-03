<div class="main" x-data = "{ rayonsChecked : @entangle('rayonsChecked').defer }">
    <div class="title">
        <p>Manage Rayon Rangement</p>
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
            <button class="filter" x-show="rayonsChecked.length > 0" x-on:click="$wire.deletedRayons(rayonsChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.rayon.create') }}">Add Rangement Rayon</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px;">
            <input type="text" name="rayon" wire:model="rayon" placeholder="Libellé du rayon">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px;">
            <input type="text" name="code" wire:model="code" placeholder="Code du rayon">
            <ion-icon name="search"></ion-icon>
        </div>
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
                    <x-table-header label="N°" :direction="$orderDirection" name="id" :field="$orderField"></x-table-header>
                    <x-table-header label="Rayon" :direction="$orderDirection" name="libelle" :field="$orderField"></x-table-header>
                    <x-table-header label="Code" :direction="$orderDirection" name="code" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($rayons as $rayon)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="rayonsChecked" value="{{ $rayon->id }}">
                        </td>
                        <td>{{ $rayon->id }}</td>
                        <td>{{ $rayon->libelle }}</td>
                        <td>{{ $rayon->code }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.rayon.edit', ['rayon' => $rayon->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.rayon.destroy', ['rayon' => $rayon->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Rayon de Rangement en base de données
                @endforelse
            </tbody>
        </table>
        <div class="warningMessageContainer">
            <div class="overlay"></div>
            <div class="warning">
                <ion-icon name="alert-circle"></ion-icon>
                <h3>Voulez-vous vraiment supprimer ce rayon ?</h3>
                <form action="" class="deleteForm" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" class="closeWarning">Annuler</button>
                    <button type="submit" class="submitdeleteForm">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>