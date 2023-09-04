@extends('admin.layouts.template')

    @section('title')
        Classer un document
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{-- {{ route('manager.document.index') }} --}}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> Classement du document N°{{ $document->id }}</h1>
            <form method="POST" action="{{ route('manager.document.classement', ['document' => $document->id, 'transfert' => $transfert]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <x-input class="inputContainer" id="signature" label="Signature" type="text" name="signature" placeholder="Signature"  readonly="readonly" value="{{ $document->signature }}" />

                <x-input class="inputContainer" id="nom" label="Nom du Document" type="text" name="nom" placeholder="Nom du Document" readonly="readonly" value="{{ $document->nom }}" />

                <x-input class="inputContainer readonly" id="motclef" label="Mot-Clefs" type="textarea" name="motclefs" placeholder=""  readonly="readonly" value="{{ $motclefs ?: 'Le document n\'a pas de mots clés facilitant sa recherche' }} " />

                <x-input class="inputContainer objet" id="objet" label="Objet" type="text" name="objet" placeholder="Objet du Document" readonly="readonly" value="{{ $document->objet }}" />

                <x-input class="inputContainer" id="emetteur" label="Émetteur" type="text" name="emetteur" placeholder="Émetteur"  readonly="readonly" value="{{ $document->emetteur }}" />

                <x-input class="inputContainer" id="recepteur" label="Récepteur" type="text" name="recepteur" placeholder="Récepeteur"  readonly="readonly" value="{{ $document->recepteur }}" />

                @livewire('classement-dynamic-select', [
                    'chemises' => $chemises,
                    'boites' => $boites,
                    'rayons' => $rayons,
                    'document' => $document
                ])

                <div class="inputContainer button">
                    <button type="submit">Classer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
