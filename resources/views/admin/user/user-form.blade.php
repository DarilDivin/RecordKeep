@extends('admin.layouts.template')

    @section('title')
        Admin-User-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.user.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $user->exists ? 'Éditer un Utilisateur' : 'Ajouter un Utilisateur' }} </h1>
            @if ($errors->any())
                <div class="message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route($user->exists ? 'admin.user.update' : 'register', ['user' => $user->id]) }}" enctype="multipart/form-data">
                @csrf
                @method($user->exists ? 'put' : 'post')
                <x-input class="inputContainer" id="matricule" label="Matricule" type="text" name="matricule" placeholder="Matricule"  readonly="" value="{{ $user->matricule }}" />

                <x-input class="inputContainer" id="nom" label="Nom" type="text" name="nom" placeholder="Nom" readonly="" value="{{ $user->nom }}" />

                <x-input class="inputContainer" id="prenoms" label="Prénom" type="text" name="prenoms" placeholder="Prénom" readonly="" value="{{ $user->prenoms }}" />

                <x-input class="inputContainer" id="email" label="Email" type="email" name="email" placeholder="Email"  readonly="" value="{{ $user->email }}" />

                <x-input class="inputContainer" id="password" label="Mot de passe" type="password" name="password" placeholder="Mot de passe"  readonly="" value="" />

                <x-input class="inputContainer" id="password_confirmation" label="Confirmer Mot de passe" type="password" name="password_confirmation" placeholder="Confirmer Mot de passe"  readonly="" value="" />

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

                <x-select class="inputContainer" id="division" label="Division" name="division_id" :value="$divisions" elementIdOnEntite="{{ $user->division_id }}" />

                <x-select class="inputContainer" id="fonction" label="Fonction" name="fonction_id" :value="$fonctions" elementIdOnEntite="{{ $user->fonction_id }}" />

                <x-select class="inputContainer" id="role" label="Rôle" name="role_id" :value="$roles" elementIdOnEntite="{{ $user->role_id }}" />

                <div class="inputContainer button">
                    <button type="submit">{{ $user->exists ? 'Éditer' : 'Créer' }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
