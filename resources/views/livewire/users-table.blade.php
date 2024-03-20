<div class="main" x-data = "{ usersChecked : @entangle('usersChecked').defer }">
    <div class="title">
        <p>Gestion des Utilisateurs</p>
        <ion-icon name="person"></ion-icon>
    </div>
    {{-- x-on:click="$wire.deletedUsers(usersChecked)" --}}
    <div class="optional">
        <div class="buttons">
            <button class="filter" id="massDelete" x-show="usersChecked.length > 0" x-cloak>
                <ion-icon name="trash-outline"></ion-icon>
                Supprimer
            </button>
            <button class="add">
                <ion-icon name="add"></ion-icon>
                <a href="{{ route('admin.user.create') }}">Ajouter Utilisateur</a>
            </button>
        </div>
        <div class="search-box" style="width: 23%;">
            <input type="text" name="nom" wire:model="nom" placeholder="Nom de l'utilisateur" style="height: 35px;">
            <ion-icon name="search"></ion-icon>
        </div>
        <div class="search-box" style="margin-right: 17px; width: 22%;"">
            <input type="text" name="matricule" wire:model="matricule" placeholder="Matricule de l'utilisateur" style="height: 35px;">
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
                    <x-table-header label="Matricule" :direction="$orderDirection" name="matricule" :field="$orderField"></x-table-header>
                    <x-table-header label="Nom" :direction="$orderDirection" name="nom" :field="$orderField"></x-table-header>
                    <x-table-header label="Prénom(s)" :direction="$orderDirection" name="prenoms" :field="$orderField"></x-table-header>
                    <x-table-header label="Email" :direction="$orderDirection" name="email" :field="$orderField"></x-table-header>
                    <x-table-header label="Direction" :direction="$orderDirection" name="direction_id" :field="$orderField"></x-table-header>
                    <x-table-header label="Fonction" :direction="$orderDirection" name="fonction_id" :field="$orderField"></x-table-header>
                    <td>Rôle(s)</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" x-model="usersChecked" value="{{ $user->id }}">
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->matricule }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenoms }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->direction?->sigle }}</td>
                        <td>{{ $user->fonction?->fonction }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name}}
                                @if (!$loop->last)
                                    ,<br>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <button class="edit">
                                <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                                    Editer
                                </a>
                            </button>
                            <button
                                class="delete"
                                routeForDeleting="{{ route('admin.user.destroy', ['user' => $user->id]) }}">
                                <a href="" onclick="event.preventDefault()">
                                    Supprimer
                                </a>
                            </button>
                        </td>
                    </tr>
                @empty
                    Aucun utilisateur en base de données
                @endforelse
            </tbody>
        </table>
        {{ $users->onEachSide(0)->links() }}
    </div>

    <div class="warningMessageContainer" id="mass">
        <div class="overlay mass"></div>
        <div class="warning">
            <ion-icon name="alert-circle"></ion-icon>
            <h3>Voulez-vous vraiment éffectuer cette suppression ?</h3>
            <form class="deleteForm">
                <button type="button" class="closeWarning mass">Annuler</button>
                <button type="submit" class="submitdeleteForm mass" indexRoute="" x-on:click="$wire.deletedUsers(usersChecked)">Supprimer</button>
            </form>
        </div>
    </div>
</div>
