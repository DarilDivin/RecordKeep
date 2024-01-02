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

                <x-input class="inputContainer fonction" id="dua" label="DUA (Durée d'Utilité Administrative)" type="number" name="dua" placeholder="DUA du Document"  readonly="" value="{{ $nature->dua }}" />

                <x-select class="inputContainer fonction" id="categories" label="Catégorie de la Nature de Document" name="categorie_id" :value="$categories" elementIdOnEntite="{{ $nature->categorie_id }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $nature->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
