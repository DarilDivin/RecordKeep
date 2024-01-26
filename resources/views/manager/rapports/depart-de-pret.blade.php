@extends('admin.layouts.template')

    @section('title')
        Validation de prêt
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('rapport-depart-list') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> Rédiger un rapport de depart de prêt </h1>

            <form method="POST" action="{{ route('rapport-depart-store') }}" enctype="multipart/form-data" class="rapport">
                @csrf
                @method('post')
                <x-input class="inputContainer DebMoit" id="nomDoc" label="Nom du Document" type="text" name="nomDoc" placeholder=""  readonly="readonly" value="{{ $demande->document->nom }}" />

                <x-input class="inputContainer MoitFin" id="sigDoc" label="Signature du Document" type="text" name="sig" placeholder="" readonly="readonly" value="{{ $demande->document->timbre }}" />

                <x-input class="inputContainer DebMoit" id="nomUser" label="Nom du demandeur" type="text" name="nomUser" placeholder=""  readonly="readonly" value="{{ $demande->user->nom }}" />

                <x-input class="inputContainer MoitFin" id="emailUser" label="Email de l'Utilisateur" type="text" name="emailuser" placeholder="" readonly="readonly" value="{{ $demande->user->email }}" />

                <x-input class="inputContainer DebFin" id="observation" label="Observation" type="textarea" name="observation" placeholder=""  readonly="" value="" />

                <x-input class="inputContainer DebMoit" id="etat_doc" label="Etat du document" type="text" name="etat_doc" placeholder="Détruit"  readonly="" value="" />

                <x-input class="" id="nomDoc" label="" type="hidden" name="demande_pret_id" placeholder=""  readonly="readonly" value="{{ $demande->id }}" />


                <div class="inputContainer button">
                    <button type="submit">Générer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
