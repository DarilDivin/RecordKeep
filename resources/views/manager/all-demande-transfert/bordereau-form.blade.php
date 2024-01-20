@php
    use App\Models\User;
    use App\Models\DemandeTransfert;

    $directionId = DemandeTransfert::find($transfert->id)->direction->id;
    $standardManager = User::whereHas('direction', function ($query) use ($directionId) {
        $query->where('id', $directionId);
    })->whereHas('roles', function ($query) {
        $query->where('name', 'Gestionnaire-Standard');
    })->get();
@endphp

@extends('admin.layouts.template')

    @section('title')
        Bordereau de Transfert
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('manager.transfert.all') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> Rédiger un Bordereau de Transfert </h1>

            <form method="POST" action="{{ route('manager.transfert.bordereau-create', ['transfert' => $transfert]) }}" enctype="multipart/form-data" class="rapport">
                @csrf
                @method('patch')

                <x-input class="inputContainer DebMoit" id="transfertName" label="Libellé de la Demande de Transfert" type="text" name="transfertName" placeholder=""  readonly="readonly" value="{{ $transfert->libelle }}" />

                <x-input class="inputContainer MoitFin" id="direction" label="Direction de Provenance" type="text" name="username" placeholder=""  readonly="readonly" value="{{ $transfert->direction->sigle }}" />

                <x-input class="inputContainer DebMoit" id="username" label="Nom et prénoms du transféreur" type="text" name="username" placeholder=""  readonly="readonly" value="{{ $standardManager[0]->prenoms }} {{ $standardManager[0]->nom }}" />

                <x-input class="inputContainer MoitFin" id="emailUser" label="Email du transféreur" type="text" name="emailUser" placeholder="" readonly="readonly" value="{{ $standardManager[0]->email }}" />

                <x-input class="inputContainer DebFin" id="observation" label="Observation" type="textarea" name="observation" placeholder=""  readonly="" value="" />


                <div class="inputContainer button">
                    <button type="submit">Générer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
