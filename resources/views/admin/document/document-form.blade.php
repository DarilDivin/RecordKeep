@extends('admin.layouts.template')

    @section('title')
        Admin-Document-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="close-outline"></ion-icon>
            </span>
            <h1> {{ $document->exists ? 'Éditer un Document' : 'Ajouter un Document' }} </h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <form method="POST" action="{{ route($document->exists ? 'admin.document.update' : 'admin.document.store', ['document' => $document->id]) }}" enctype="multipart/form-data">
                @csrf
                @method($document->exists ? 'put' : 'post')
                <x-input class="inputContainer" id="signature" label="Signature" type="text" name="signature" placeholder="Signature"  readonly="" value="{{ $document->signature }}" />

                <x-input class="inputContainer" id="nom" label="Nom du Document" type="text" name="nom" placeholder="Nom du Document" readonly="" value="" />

                <x-input class="inputContainer objet" id="objet" label="Objet" type="text" name="objet" placeholder="Objet du Document" readonly="" value="{{ $document->objet }}" />

                <x-input class="inputContainer" id="emetteur" label="Émetteur" type="text" name="emetteur" placeholder="Émetteur"  readonly="" value="{{ $document->emetteur }}" />

                <x-input class="inputContainer" id="recepteur" label="Récepteur" type="text" name="recepteur" placeholder="Récepeteur"  readonly="" value="{{ $document->recepteur }}" />

                <x-select class="inputContainer" id="direction" label="Direction" name="direction_id" value="DSI"/>

                <x-select class="inputContainer" id="service" label="Service" name="service_id" value="DSI"/>

                <x-select class="inputContainer" id="division" label="Division" name="division_id" value="DSI"/>

                <x-input class="inputContainer" id="dua" label="DUA" type="number" name="dua" placeholder="DUA"  readonly="" value="{{ $document->dua }}" />

                <x-select class="inputContainer" id="nature" label="Nature du Document" name="nature" value="Note de Service"/>

                <div class="inputContainer motClé">
                    <label for="signature">Mots-Clefs</label>
                    <div class="inputs">
                        <input type="text" name="" placeholder="Mots-Clefs">
                        <button type="button">Ajouter</button>
                    </div>
                </div>

                <x-input class="inputContainer document" id="document" label="Document" type="file" name="document" placeholder=""  readonly="" value="" />

                <x-input class="inputContainer" id="datecreation" label="Date de Création" type="date" name="datecreation" placeholder="2023"  readonly="" value="" />

                <x-input class="inputContainer readonly" id="motclefs" label="Mot-Clefs" type="textarea" name="motclefs" placeholder=""  readonly="readonly" value="" />
                <div class="inputContainer autorisation">
                    <h4>Acorder l'accès à :</h4>

                    <x-checkbox class="checkboxContainer" id="directeur" label="Directeur" type="checkbox" name="directeur"/>

                    <x-checkbox class="checkboxContainer" id="chefservice" label="Chef Service" type="checkbox" name="chefservice"/>

                    <x-checkbox class="checkboxContainer" id="directeur" label="Directeur" type="checkbox" name="directeur"/>

                    <x-checkbox class="checkboxContainer" id="directeur" label="Directeur" type="checkbox" name="directeur"/>
                </div>

                <div class="inputContainer button">
                    <button type="submit">{{ $document->exits ? 'Éditer' : 'Créer' }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
