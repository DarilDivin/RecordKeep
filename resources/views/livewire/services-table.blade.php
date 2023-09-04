<div class="main" x-data = "{ servicesChecked : @entangle('servicesChecked').defer }">
    <div class="title">
        <p>Gestion des Services</p>
        <ion-icon name="business"></ion-icon>
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
            <button class="filter" x-show="servicesChecked.length > 0" x-on:click="$wire.deletedServices(servicesChecked)">
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.service.create') }}">Add Service</a>
            </button>
        </div>
        <div class="check-categorie-documents" style="width: 26%;">
            <select class="inputContainer" id="direction" wire:model="selectedDirection" name="direction_id" style="height: 35px;">
                <option value="">Sélectionnez une direction</option>
                @foreach ($directions as $id => $direction)
                    <option value="{{ $id }}">{{ $direction }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-box" style="width: 26%;">
            <input type="text" name="service" wire:model="service" placeholder="Nom du service" style="height: 35px;">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 26%;">
            <input type="text" name="sigle" wire:model="sigle" placeholder="Sigle du service" style="height: 35px;">
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
                    <x-table-header label="Service" :direction="$orderDirection" name="service" :field="$orderField"></x-table-header>
                    <x-table-header label="Sigle" :direction="$orderDirection" name="sigle" :field="$orderField"></x-table-header>
                    <x-table-header label="Direction" :direction="$orderDirection" name="direction_id" :field="$orderField"></x-table-header>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="servicesChecked" value="{{ $service->id }}">
                        </td>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->service }}</td>
                        <td>{{ $service->sigle }}</td>
                        <td>{{ $service?->direction?->direction }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.service.edit', ['service' => $service->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.service.destroy', ['service' => $service->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucun service en base de données
                @endforelse
            </tbody>
        </table>
        {{ $services->onEachSide(0)->links() }}
    </div>
</div>
