<div class="main" x-data = "{ divisionsChecked : @entangle('divisionsChecked').defer }">
    <div class="title">
        <p>Gestion des Divisions</p>
        <ion-icon name="business"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="divisionsChecked.length > 0" x-on:click="$wire.deletedDivisions(divisionsChecked)" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.division.create') }}">Add Division</a>
            </button>
        </div>
        <div class="check-categorie-documents" style="width: 26%;">
            <select class="inputContainer" id="direction" wire:model="selectedService" name="service_id" style="height: 35px;">
                <option value="">Sélectionnez un service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->service . ' ' . '(' . $service->direction->sigle . ')' }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-box" style="width: 26%;">
            <input type="text" name="division" wire:model="division" placeholder="Nom de la division">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 26%;">
            <input type="text" name="sigle" wire:model="sigle" placeholder="Sigle de la division">
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
                    <x-table-header label="Division" :direction="$orderDirection" name="division" :field="$orderField"></x-table-header>
                    <x-table-header label="Sigle" :direction="$orderDirection" name="sigle" :field="$orderField"></x-table-header>
                    <x-table-header label="Service" :direction="$orderDirection" name="service_id" :field="$orderField"></x-table-header>
                    <td>Direction</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($divisions as $division)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="divisionsChecked" value="{{ $division->id }}">
                        </td>
                        <td>{{ $division->id }}</td>
                        <td>{{ Str::limit($division->division, 40, '...') }}</td>
                        <td>{{ $division->sigle }}</td>
                        <td>{{ $division?->service?->service }}</td>
                        <td>{{ $division?->service?->direction?->sigle }}</td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.division.edit', ['division' => $division->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.division.destroy', ['division' => $division->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucune division en base de données
                @endforelse
            </tbody>
        </table>
        {{ $divisions->onEachSide(0)->links() }}
    </div>
</div>
