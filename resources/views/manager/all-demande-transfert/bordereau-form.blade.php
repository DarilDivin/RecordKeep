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

                <x-input class="inputContainer DebMoit" id="nomUser" label="Nom du transféreur" type="text" name="nomUser" placeholder=""  readonly="readonly" value="{{ $transfert->user->prenoms }}" />

                <x-input class="inputContainer MoitFin" id="emailUser" label="Email du transféreur" type="text" name="emailuser" placeholder="" readonly="readonly" value="{{ $transfert->user->email }}" />

                <x-input class="inputContainer DebFin" id="observation" label="Observation" type="textarea" name="observation" placeholder=""  readonly="" value="" />


                <div class="inputContainer button">
                    <button type="submit">Générer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
