@extends('admin.layouts.template')

    @section('title')
        Admin-User-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="close-outline"></ion-icon>
            </span>
            <h1> {{ $user->exists ? 'Éditer un Utilisateur' : 'Ajouter un Utilisateur' }} </h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <form method="POST" action="{{ route($user->exists ? 'admin.user.update' : 'admin.user.store', ['user' => $user->id]) }}" enctype="multipart/form-data">
                @csrf
                @method($user->exists ? 'put' : 'post')
                <x-input class="inputContainer" id="matricule" label="Matricule" type="text" name="matricule" placeholder="Matricule"  readonly="" value="{{ $user->matricule }}" />

                <x-input class="inputContainer" id="nom" label="Nom" type="text" name="nom" placeholder="Nom" readonly="" value="{{ $user->nom }}" />

                <x-input class="inputContainer" id="prenoms" label="Prénom" type="text" name="prenoms" placeholder="Prénom" readonly="" value="{{ $user->prenoms }}" />

                <x-input class="inputContainer" id="email" label="Email" type="email" name="email" placeholder="Email"  readonly="" value="{{ $user->email }}" />

                <x-input class="inputContainer" id="password" label="Mot de passe" type="text" name="password" placeholder="Mot de passe"  readonly="" value="" />

                {{-- <x-select class="inputContainer" id="sexe" label="Sexe" name="sexe" value="Masculin" /> --}}

                <div class="inputContainer">
                    <label for="sexe">Sexe</label>
                    <select name="sexe" id="sexe">
                            <option value="masculin">Masculin</option>
                            <option value="feminin">Féminin</option>
                            <option value="autre">Autre</option>
                    </select>
                    @error('sexe')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <x-input class="inputContainer" id="datenaissance" label="Date de naissance" type="date" name="datenaissance" placeholder="Date de naissance"  readonly="" value="{{ $user->datenaissance }}" />


                <x-select class="inputContainer" id="division" label="Division" name="division_id" :value="$divisions"/>

                <x-select class="inputContainer" id="fonction" label="Fonction" name="fonction_id" :value="$fonctions"/>

                {{-- <x-select class="inputContainer" id="role" label="Rôle" name="role" :value=""/> --}}

                <div class="inputContainer">
                    <label for="role">Rôle</label>
                    <select name="role" id="role">
                            <option value="utilisateur">Utilisateur</option>
                            <option value="gestionnaire">Gestionnaire</option>
                            <option value="administrateur">Administrateur</option>
                    </select>
                    @error('role')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inputContainer button">
                    <button type="submit">{{ $user->exists ? 'Éditer' : 'Créer' }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
