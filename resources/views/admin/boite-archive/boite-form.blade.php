@extends('admin.layouts.template')

    @section('title')
        Admin-Boite-Archive-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
            <h1> {{ $boite->exists ? 'Éditer une Boite Archive' : 'Ajouter une Boite Archive' }} </h1>
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
            <form method="POST" action="{{ route($boite->exists ? 'admin.boite.update' : 'admin.boite.store', ['boite' => $boite->id]) }}">
                @csrf
                @method($boite->exists ? 'put' : 'post')
                <x-input class="inputContainer boite" id="boite" label="Boite" type="text" name="libelle" placeholder="Boite"  readonly="" value="{{ $boite->libelle }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $boite->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
