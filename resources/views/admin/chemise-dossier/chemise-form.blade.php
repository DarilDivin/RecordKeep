@extends('admin.layouts.template')

    @section('title')
        Admin-Chemise-Dossier-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.chemise.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $chemise->exists ? 'Éditer une Chemise de Dossier' : 'Ajouter une Chemise de Dossier' }} </h1>
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
            <form method="POST" action="{{ route($chemise->exists ? 'admin.chemise.update' : 'admin.chemise.store', ['chemise' => $chemise->id]) }}">
                @csrf
                @method($chemise->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="chemise" label="Chemise" type="text" name="libelle" placeholder="Chemise"  readonly="" value="{{ $chemise->libelle }}" />

                <x-select class="inputContainer fonction" id="rayon" label="Boîte Archive" name="boite_archive_id" :value="$boites" elementIdOnEntite="{{ $chemise->boite_archive_id }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $chemise->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
