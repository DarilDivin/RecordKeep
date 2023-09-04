@extends('admin.layouts.template')

    @section('title')
        {{ $document->exists ? 'Modifier un document' : 'Créer un document' }}
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('manager.document.index') }}">
                <span class="closeDocumentForm">
                        <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>

            <h1> {{ $document->exists ? 'Éditer un Document' : 'Ajouter un Document' }} </h1>
            <form method="POST" action="{{ route($document->exists ? 'manager.document.update' : 'manager.document.store', ['document' => $document->id]) }}" enctype="multipart/form-data">
                @csrf
                @method($document->exists ? 'put' : 'post')
                <x-input class="inputContainer" id="signature" label="Signature" type="text" name="signature" placeholder="Signature"  readonly="" value="{{ $document->signature }}" />

                <x-input class="inputContainer" id="nom" label="Nom du Document" type="text" name="nom" placeholder="Nom du Document" readonly="" value="{{ $document->nom }}" />

                <x-input class="inputContainer" id="emetteur" label="Émetteur" type="text" name="emetteur" placeholder="Émetteur"  readonly="" value="{{ $document->emetteur }}" />

                <x-input class="inputContainer objet" id="objet" label="Objet" type="text" name="objet" placeholder="Objet du Document" readonly="" value="{{ $document->objet }}" />

                <x-input class="inputContainer" id="recepteur" label="Récepteur" type="text" name="recepteur" placeholder="Récepeteur"  readonly="" value="{{ $document->recepteur }}" />

                @include('shared.tom-select')

                <x-input class="inputContainer" id="dua" label="DUA" type="number" name="dua" placeholder="DUA"  readonly="" value="{{ $document->dua }}" />

                <x-select class="inputContainer" id="nature" label="Nature du Document" name="nature_document_id" :value="$natures" elementIdOnEntite="{{ $document->nature_document_id }}" />

                <x-select class="inputContainer" id="categories" label="Catégorie du Document" name="categorie_id" :value="$categories" elementIdOnEntite="{{ $document->categorie_id }}" />

                <x-input class="inputContainer" id="source" label="Source du Document" type="text" name="source" placeholder="Source du Document" readonly="" value="{{ $document->source }}" />

                <x-input class="inputContainer" id="datecreation" label="Date de Création" type="date" name="datecreation" placeholder=""  readonly="" value="{{ $document->datecreation/* ->format('d/F/Y') */ }}" />

                @livewire('document-dynamic-select', [
                    'directions' => $directions,
                    'divisions' => $divisions,
                    'document' => $document,
                    'services' => $services,
                ])

                <x-input class="inputContainer" id="document" label="Document" type="file" name="document" placeholder=""  readonly="" value="" />

                <div class="inputContainer autorisation">
                    <h4>Acorder l'accès à :</h4>

                    @foreach ($fonctions as $id => $fonction)
                        <x-checkbox class="checkboxContainer" :id="$fonction" :label="$fonction" type="checkbox" name="fonction" :value="$id"  :ex="$document->fonctions->pluck('id')->toArray()" :fonction="$fonction" />
                    @endforeach
                    @error('fonction')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>


                <div class="inputContainer button">
                    <button type="submit">{{ $document->exits ? 'Éditer' : 'Créer' }}</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        new TomSelect('#motclefs', {
            create: true,
            plugins: {
                remove_button:{
                    title:'Remove this item',
                }
            },
        });
    </script>

@endsection
