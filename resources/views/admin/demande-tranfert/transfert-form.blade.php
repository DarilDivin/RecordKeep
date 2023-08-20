@extends('admin.layouts.template')

    @section('title')
        Admin-Demande-Transfert-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
            <h1> {{ $transfert->exists ? 'Éditer une Demande de Transfert' : 'Ajouter une Demande de Transfert' }} </h1>
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
            <form method="POST" action="{{ route($transfert->exists ? 'admin.transfert.update' : 'admin.transfert.store', ['transfert' => $transfert->id]) }}">
                @csrf
                @method($transfert->exists ? 'put' : 'post')
                <x-input class="inputContainer transfert" id="transfert" label="Libellé" type="text" name="libelle" placeholder="Demande de Transfert"  readonly="" value="{{ $transfert->libelle }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $transfert->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
