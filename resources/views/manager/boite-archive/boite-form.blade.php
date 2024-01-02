@extends('admin.layouts.template')

    @section('title')
        {{ $boite->exists ? 'Éditer une Boite d\'Archive' : 'Ajouter une Boite d\'Archive' }}
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('manager.boite.index') }}">
                <span class="closeDocumentForm">
                        <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $boite->exists ? 'Éditer une Boite d\'Archive' : 'Ajouter une Boite d\'Archive' }} </h1>
            <form method="POST" action="{{ route($boite->exists ? 'manager.boite.update' : 'manager.boite.store', ['boite' => $boite->id]) }}">
                @csrf
                @method($boite->exists ? 'put' : 'post')

                <x-input class="inputContainer fonction" id="boite" label="Boite Archive(Libellé)" type="text" name="libelle" placeholder="Boite d'Archive"  readonly="" value="{{ $boite->libelle }}" />

                <x-select class="inputContainer fonction" id="rayon" label="Rayon de Rangement" name="rayon_rangement_id" :value="$rayons" elementIdOnEntite="{{ $boite->rayon_rangement_id }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $boite->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
