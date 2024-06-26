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
                <x-input class="inputContainer" id="reference" label="Référence du document" type="text" name="reference" placeholder="Référence du document"  readonly="" value="{!! $document->reference !!}" />

                {{-- <x-input class="inputContainer" id="nom" label="Nom du Document" type="text" name="nom" placeholder="Nom du Document" readonly="" value="{!! $document->nom !!}" /> --}}

                <x-input class="inputContainer objet requiredStar" id="objet" label="Objet du document" type="text" name="objet" placeholder="Objet du document" readonly="" value="{!! $document->objet !!}" />

                <x-input class="inputContainer" id="expediteur" label="Expéditeur du document" type="text" name="expediteur" placeholder="Expéditeur du document"  readonly="" value="{!! $document->expediteur !!}" />

                <x-input class="inputContainer" id="destinataire" label="Destinataire du document" type="text" name="destinataire" placeholder="Destinataire du document"  readonly="" value="{!! $document->destinataire !!}" />

                <x-select class="inputContainer requiredStar" id="nature" label="Nature du document" name="nature_document_id" :value="$natures" elementIdOnEntite="{{ $document->nature_document_id }}" />

                @include('shared.tom-select')


                <x-date-input class="inputContainer requiredStar" id="datecreation" label="Date de création du document" type="date" name="datecreation" placeholder=""  readonly="" max="9999-04-30" value="{{ $document->datecreation }}" />

                <x-input class="inputContainer {{ request()->route()->getName() === 'manager.document.edit' ? '' : 'requiredStar' }}" id="document" label="Document" type="file" name="document" placeholder=""  readonly="" value="" />

                @livewire('document-dynamic-select', [
                    'directions' => $directions,
                    'divisions' => $divisions,
                    'document' => $document,
                    'services' => $services,
                ])


                <div class="inputContainer  autorisation">
                    <h4>Acorder l'accès à :</h4>

                    @foreach ($fonctions as $id => $fonction)
                        <x-checkbox class="checkboxContainer" :id="$fonction" :label="$fonction" type="checkbox" name="fonctions" :value="$id"  :ex="$document->fonctions->pluck('id')->toArray()" :fonction="$fonction" />
                    @endforeach
                    @error('fonctions')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inputContainer button">
                    <button type="submit">{{ $document->exists ? 'Éditer' : 'Créer' }}</button>
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
