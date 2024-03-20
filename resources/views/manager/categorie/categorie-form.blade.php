@extends('admin.layouts.template')

    @section('title')
        {{ $categorie->exists ? 'Éditer une Catégorie' : 'Ajouter une Catégorie' }}
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('manager.categorie.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $categorie->exists ? 'Éditer une Catégorie' : 'Ajouter une Catégorie' }} </h1>
            <form method="POST" action="{{ route($categorie->exists ? 'manager.categorie.update' : 'manager.categorie.store', ['categorie' => $categorie->id]) }}">
                @csrf
                @method($categorie->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="categorie" label="Catégorie" type="text" name="categorie" placeholder="Catégorie"  readonly="" value="{!! $categorie->categorie !!}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $categorie->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
