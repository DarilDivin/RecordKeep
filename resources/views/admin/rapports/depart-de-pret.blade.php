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
            <h1> Rédiger un rapport de depart de prêt </h1>
            {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif --}}
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('post')
                <x-input class="inputContainer" id="nomDoc" label="Nom du Document" type="text" name="nomDoc" placeholder=""  readonly="readonly" value="{{ $document->nom }}" />

                <x-input class="inputContainer" id="sigDoc" label="Signature du Document" type="text" name="sig" placeholder="" readonly="readonly" value="{{ $document->signature }}" />

                <x-input class="inputContainer" id="nomUser" label="Nom du demandeur" type="text" name="nomUser" placeholder=""  readonly="readonly" value="{{ $name }}" />

                <x-input class="inputContainer" id="emailUser" label="Email de l'Utilisateur" type="text" name="emailuser" placeholder="" readonly="readonly" value="{{ $email }}" />

                <x-input class="inputContainer" id="observation" label="Observation" type="textarea" name="observation" placeholder=""  readonly="" value="" />

                <x-input class="inputContainer" id="etat-doc" label="Etat du document" type="text" name="etat-doc" placeholder="Détruit"  readonly="" value="" />


                <div class="inputContainer button">
                    <button type="submit">Générer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
