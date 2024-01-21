@extends('admin.layouts.template')

    @section('title')
        Classer un document
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            @php
                $previousurl = url()->previous();
            @endphp
            <a href="@if(Str::contains($previousurl, 'all-transferts')) {{ route('manager.transfert.one', ['slug' => $transfert->getSlug(),'transfert' => $transfert ]) }} @elseif(Str::contains($previousurl, 'document')) {{ route('manager.document.classed') }} @endif">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> Classement du document N°{{ $document->id }}</h1>
            <form method="POST" action="{{ route('manager.document.classement', ['document' => $document->id, 'transfert' => $transfert]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

               {{--  @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}

                <x-input class="inputContainer" id="timbre" label="Timbre" type="text" name="timbre" placeholder="Timbre"  readonly="readonly" value="{{ $document->timbre }}" />

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
                    <button type="submit">Soumettre le Classement</button>
                </div>
            </form>
        </div>
    </div>

@endsection
