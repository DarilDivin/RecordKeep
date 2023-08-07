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
            <h1> Classer un document </h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('post')
                <x-input class="inputContainer" id="signature" label="Signature" type="text" name="signature" placeholder="Signature"  readonly="" value="" />

                <x-input class="inputContainer" id="nom" label="Nom du Document" type="text" name="nom" placeholder="Nom du Document" readonly="" value="" />

                <x-input class="inputContainer readonly" id="motclefs" label="Mot-Clefs" type="textarea" name="motclefs" placeholder=""  readonly="readonly" value="" />

                <x-input class="inputContainer objet" id="objet" label="Objet" type="text" name="objet" placeholder="Objet du Document" readonly="" value="" />

                <x-input class="inputContainer" id="emetteur" label="Émetteur" type="text" name="emetteur" placeholder="Émetteur"  readonly="" value="" />

                <x-input class="inputContainer" id="recepteur" label="Récepteur" type="text" name="recepteur" placeholder="Récepeteur"  readonly="" value="" />


                <div class="inputContainer button">
                    <button type="submit">Classer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
