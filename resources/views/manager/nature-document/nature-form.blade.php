@extends('admin.layouts.template')

    @section('title')
        {{ $nature->exists ? 'Éditer une Nature de Document' : 'Ajouter une Nature de Document' }}
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('manager.nature.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $nature->exists ? 'Éditer une Nature de Document' : 'Ajouter une Nature de Document' }} </h1>
            <form method="POST" action="{{ route($nature->exists ? 'manager.nature.update' : 'manager.nature.store', ['nature' => $nature->id]) }}">
                @csrf
                @method($nature->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="nature" label="Nature de Document" type="text" name="nature" placeholder="Nature de Document"  readonly="" value="{{ $nature->nature }}" />

                <x-input class="inputContainer fonction" id="duree_communicabilite" label="DC (Durée de Communicabilité en ans)" type="number" name="duree_communicabilite" placeholder="Durée de Communicabilité"  readonly="" value="{{ $nature->duree_communicabilite }}" />

                <x-input class="inputContainer fonction" id="dua_bureaux" label="DUA (Durée d'Utilité Administrative en ans) aux bureaux" type="number" name="dua_bureaux" placeholder="DUA aux bureaux"  readonly="" value="{{ $nature->dua_bureaux }}" />

                <x-input class="inputContainer fonction" id="dua_service_pre_archivage" label="DUA (Durée d'Utilité Administrative en ans) au service de pré-archivage" type="number" name="dua_service_pre_archivage" placeholder="DUA au service de pré-archivage"  readonly="" value="{{ $nature->dua_service_pre_archivage }}" />

                <x-select class="inputContainer fonction" id="categories" label="Catégorie de la Nature de Document" name="categorie_id" :value="$categories" elementIdOnEntite="{{ $nature->categorie_id }}" />

                <div class="inputContainer fonction">
                    <label for="visible">Accessible à : </label>
                    <select name="visible" id="visible">
                        <option @selected(old('visible', $nature->visible) == 0) value="0">Membres de la Direction</option>
                        <option @selected(old('visible', $nature->visible) == 1) value="1">Tout le monde</option>
                    </select>
                    @error('visible')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $nature->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
