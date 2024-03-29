@extends('admin.layouts.template')

    @section('title')
        {{ $direction->exists ? 'Éditer une Direction' : 'Ajouter une Direction' }}
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.direction.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $direction->exists ? 'Éditer une Direction' : 'Ajouter une Direction' }} </h1>
            <form method="POST" action="{{ route($direction->exists ? 'admin.direction.update' : 'admin.direction.store', ['direction' => $direction->id]) }}">
                @csrf
                @method($direction->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="direction" label="Direction" type="text" name="direction" placeholder="Direction"  readonly="" value="{!! $direction->direction !!}" />

                <x-input class="inputContainer fonction" id="sigle" label="Sigle" type="text" name="sigle" placeholder="Sigle"  readonly="" value="{!! $direction->sigle !!}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $direction->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
