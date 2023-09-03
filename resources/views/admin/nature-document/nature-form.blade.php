@extends('admin.layouts.template')

    @section('title')
        Admin-Document-Nature-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.nature.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $nature->exists ? 'Éditer une Nature de Document' : 'Ajouter une Nature de Document' }} </h1>
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
            <form method="POST" action="{{ route($nature->exists ? 'admin.nature.update' : 'admin.nature.store', ['nature' => $nature->id]) }}">
                @csrf
                @method($nature->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="nature" label="Nature de Document" type="text" name="nature" placeholder="Nature de Document"  readonly="" value="{{ $nature->nature }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $nature->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
