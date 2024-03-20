@extends('admin.layouts.template')

    @section('title')
        {{ $fonction->exists ? 'Éditer une Fonction' : 'Ajouter une Fonction' }}
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.fonction.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $fonction->exists ? 'Éditer une Fonction' : 'Ajouter une Fonction' }} </h1>
            <form method="POST" action="{{ route($fonction->exists ? 'admin.fonction.update' : 'admin.fonction.store', ['fonction' => $fonction->id]) }}">
                @csrf
                @method($fonction->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="fonction" label="Fonction" type="text" name="fonction" placeholder="Fonction"  readonly="" value="{!! $fonction->fonction !!}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $fonction->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
