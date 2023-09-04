@extends('admin.layouts.template')

    @section('title')
        {{ $rayon->exists ? 'Éditer un Rayon de Rangement' : 'Ajouter un Rayon de Rangement' }}
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('manager.rayon.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $rayon->exists ? 'Éditer un Rayon de Rangement' : 'Ajouter un Rayon de Rangement' }} </h1>
            <form method="POST" action="{{ route($rayon->exists ? 'manager.rayon.update' : 'manager.rayon.store', ['rayon' => $rayon->id]) }}">
                @csrf
                @method($rayon->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="rayon" label="Rayon de Rangement" type="text" name="libelle" placeholder="Rayon de Rangement"  readonly="" value="{{ $rayon->libelle }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $rayon->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
