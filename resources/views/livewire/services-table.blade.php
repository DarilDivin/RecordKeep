<div class="main" x-data = "{ servicesChecked : @entangle('servicesChecked').defer }">
    <div class="title">
        <p>Manage Services</p>
        <ion-icon name="business"></ion-icon>
    </div>

    <div class="optional">
        <div class="buttons">
            <button class="filter" x-show="servicesChecked.length > 0" x-on:click="$wire.deletedServices(servicesChecked)">
                <ion-icon name="filter"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.service.create') }}">Add Service</a>
            </button>
        </div>
        <form action="">
            <div class="search-box" style="margin-right: 17px;">
                <input type="text" name="service" wire:model="service" placeholder="Nom du service">
                <ion-icon name="search"></ion-icon>
            </div>
        </form>
    </div>

    @if (session('success'))
        <div class="success">
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
                            <button class="delete">
                                <a href="{{ route('admin.service.destroy', ['service' => $service->id]) }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('deleteForm{{ $service->id }}').submit();">
                                    Supprimer
                                </a>
                                <form action="{{ route('admin.service.destroy', ['service' => $service->id]) }}" method="POST" style="" id="deleteForm{{ $service->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucun service en base de données
                @endforelse
            </tbody>
        </table>
    </div>
</div>
