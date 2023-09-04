@extends('manager.layouts.template')

    @section('title')
        @if (request()->route()->getName() === 'manager.transfert.create')
            {{ 'Créer une Demande de Transfert' }}
        @elseif (request()->route()->getName() === 'manager.transfert.edit')
            {{ 'Éditer la Demande de Transfert' }}
        @endif
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('manager.transfert.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $transfert->exists ? 'Éditer votre Demande de Transfert' : 'Créer votre Demande de Transfert' }} </h1>
            <form method="POST" action="{{ route($transfert->exists ? 'manager.transfert.update' : 'manager.transfert.store', ['transfert' => $transfert->id]) }}">
                @csrf
                @method($transfert->exists ? 'put' : 'post')

                <x-input style="grid-column: 1 / span 3;" class="inputContainer transfert" id="transfert" label="Libellé de la Demande" type="text" name="libelle" placeholder="Demande de Transfert"  readonly="" value="{{ $transfert->libelle }}" />

                <div class="inputContainer TomSelect" style="grid-column: 1 / span 3;">
                    <label for="documents">Documents</label>
                    <select name="documents[]" id="documents" multiple placeholder="Choisissez quelques documents à transférer...">
                        @foreach ($documents as $id => $document)
                            <option value="{{ $id }}" @if(in_array($id, $transfert->documents->pluck('id')->toArray()) || in_array($id, old('documents', []))) selected @endif>{{ $document }}</option>
                        @endforeach
                    </select>
                    @error('documents')
                        <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $transfert->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
