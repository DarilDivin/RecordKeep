@extends('admin.layouts.template')

    @section('title')
        Admin-Fonction-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="close-outline"></ion-icon>
            </span>
            <h1> {{ $fonction->exists ? 'Éditer une Fonction' : 'Ajouter une Fonction' }} </h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <form method="POST" action="{{ route($fonction->exists ? 'admin.fonction.update' : 'admin.fonction.store', ['fonction' => $fonction->id]) }}">
                @csrf
                @method($fonction->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="fonction" label="Fonction" type="text" name="fonction" placeholder="Fonction"  readonly="" value="{{ $fonction->fonction }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $fonction->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
