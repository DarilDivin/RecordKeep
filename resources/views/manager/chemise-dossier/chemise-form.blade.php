@extends('admin.layouts.template')

    @section('title')
        {{ $chemise->exists ? 'Éditer une Chemise de Dossier' : 'Ajouter une Chemise de Dossier' }}
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('manager.chemise.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $chemise->exists ? 'Éditer une Chemise de Dossier' : 'Ajouter une Chemise de Dossier' }} </h1>
            <form method="POST" action="{{ route($chemise->exists ? 'manager.chemise.update' : 'manager.chemise.store', ['chemise' => $chemise->id]) }}">
                @csrf
                @method($chemise->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="chemise" label="Chemise" type="text" name="libelle" placeholder="Chemise"  readonly="" value="{{ $chemise->libelle }}" />

                @livewire('chemise-dynamic-select', [
                    'boites' => $boites,
                    'rayons' => $rayons,
                    'chemise' => $chemise,
                ])

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $chemise->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
