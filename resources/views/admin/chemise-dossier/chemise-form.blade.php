@extends('admin.layouts.template')

    @section('title')
        Admin-Chemise-Dossier-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
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
                <x-input class="inputContainer chemise" id="chemise" label="Chemise" type="text" name="libelle" placeholder="Chemise"  readonly="" value="{{ $chemise->libelle }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $chemise->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
