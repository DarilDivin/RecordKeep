<div class="main" x-data = "{ naturesChecked : @entangle('naturesChecked').defer }">
    <div class="title">
        <p>Manage Document Nature</p>
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
            <button class="filter" x-show="naturesChecked.length > 0" x-on:click="$wire.deletedNatures(naturesChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.nature.create') }}">Add Document Nature</a>
            </button>
        </div>
        <div class="search-box" style="margin-right: 17px;">
            <input type="text" name="nature" wire:model="nature" placeholder="Libellé de la nature">
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
                    <x-table-header label="Nature" :direction="$orderDirection" name="nature" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($natures as $nature)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="naturesChecked" value="{{ $nature->id }}">
                        </td>
                        <td>{{ $nature->id }}</td>
                        <td>{{ $nature->nature }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.nature.edit', ['nature' => $nature->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.nature.destroy', ['nature' => $nature->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune Nature de Document en base de données
                @endforelse
            </tbody>
        </table>
        <div class="warningMessageContainer">
            <div class="overlay"></div>
            <div class="warning">
                <ion-icon name="alert-circle"></ion-icon>
                <h3>Voulez-vous vraiment supprimer cette nature ?</h3>
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
