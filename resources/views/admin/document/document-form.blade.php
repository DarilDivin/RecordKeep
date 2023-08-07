@extends('admin.layouts.template')

    @section('title')
        Admin-Document-Management
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
            <h1> {{ $document->exists ? 'Éditer un Document' : 'Ajouter un Document' }} </h1>
            {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif --}}
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
            <form method="POST" action="{{ route($document->exists ? 'admin.document.update' : 'admin.document.store', ['document' => $document->id]) }}" enctype="multipart/form-data">
                @csrf
                @method($document->exists ? 'put' : 'post')
                <x-input class="inputContainer" id="signature" label="Signature" type="text" name="signature" placeholder="Signature"  readonly="" value="{{ $document->signature }}" />

                <x-input class="inputContainer" id="nom" label="Nom du Document" type="text" name="nom" placeholder="Nom du Document" readonly="" value="{{ $document->nom }}" />

                <x-input class="inputContainer" id="emetteur" label="Émetteur" type="text" name="emetteur" placeholder="Émetteur"  readonly="" value="{{ $document->emetteur }}" />

                <x-input class="inputContainer objet" id="objet" label="Objet" type="text" name="objet" placeholder="Objet du Document" readonly="" value="{{ $document->objet }}" />

                <x-input class="inputContainer" id="recepteur" label="Récepteur" type="text" name="recepteur" placeholder="Récepeteur"  readonly="" value="{{ $document->recepteur }}" />

                    <div class="inputContainer TomSelect">
                        <label for="signature">Mots clés</label>
                        <select name="direction" id="" multiple placeholder="Entrer quelques mots-clés...">
                            <option value="DSI">DSI</option>
                            <option value="DSI">DPAF</option>
                            <option value="DSI">DGSP</option>
                            <option value="DSI">DAIC</option>
                            <option value="DSI">DPPAE</option>
                            <option value="DSI">DSI</option>
                        </select>
                    </div>

                <x-input class="inputContainer" id="dua" label="DUA" type="number" name="dua" placeholder="DUA"  readonly="" value="{{ $document->dua }}" />

                <x-select class="inputContainer" id="nature" label="Nature du Document" name="nature_document_id" :value="$natures" elementIdOnEntite="{{ $document->nature_document_id }}" />

                <x-select class="inputContainer" id="direction" label="Direction" name="direction_id"  :value="$directions" elementIdOnEntite="{{ $document->direction_id }}" />

                <x-select class="inputContainer" id="service" label="Service" name="service_id" :value="$services" elementIdOnEntite="{{ $document->service_id }}" />

                <x-select class="inputContainer" id="division" label="Division" name="division_id" :value="$divisions" elementIdOnEntite="{{ $document->division_id }}" />

                <x-select class="inputContainer" id="categories" label="Catégorie du Document" name="categorie_id" :value="$categories" elementIdOnEntite="{{ $document->categorie_id }}" />

                <x-input class="inputContainer" id="source" label="Source du Document" type="text" name="source" placeholder="Source du Document" readonly="" value="{{ $document->source }}" />



                {{-- <div class="inputContainer motClé">
                    <label for="signature">Mots-Clefs</label>
                    <div class="inputs">
                        <input type="text" name="" placeholder="Mots-Clefs">
                        <button type="button">Ajouter</button>
                    </div>
                </div> --}}

                <x-input class="inputContainer" id="datecreation" label="Date de Création" type="date" name="datecreation" placeholder="12/12/2003"  readonly="" value="{{ $document->datecreation }}" />

                <x-input class="inputContainer" id="document" label="Document" type="file" name="document" placeholder=""  readonly="" value="" />




                {{-- <x-input class="inputContainer readonly" id="motclefs" label="Mot-Clefs" type="textarea" name="motclefs" placeholder=""  readonly="readonly" value="" /> --}}

                <div class="inputContainer autorisation">
                    <h4>Acorder l'accès à :</h4>

                    @foreach ($fonctions as $id => $fonction)
                        <x-checkbox class="checkboxContainer" :id="$fonction" :label="$fonction" type="checkbox" name="fonction" :value="$id"  :ex="$document->fonctions->pluck('id')->toArray()" />
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

@endsection
