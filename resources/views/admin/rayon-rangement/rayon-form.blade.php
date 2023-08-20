@extends('admin.layouts.template')

    @section('title')
        Admin-Rangement-Rangement-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
            <h1> {{ $rayon->exists ? 'Éditer un Rayon de Rangement' : 'Ajouter un Rayon de Rangement' }} </h1>
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
            <form method="POST" action="{{ route($rayon->exists ? 'admin.rayon.update' : 'admin.rayon.store', ['rayon' => $rayon->id]) }}">
                @csrf
                @method($rayon->exists ? 'put' : 'post')
                <x-input class="inputContainer rayon" id="rayon" label="Rayon" type="text" name="libelle" placeholder="Rayon"  readonly="" value="{{ $rayon->libelle }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $rayon->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection