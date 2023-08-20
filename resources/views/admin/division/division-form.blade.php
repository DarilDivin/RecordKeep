@extends('admin.layouts.template')

    @section('title')
        Admin-Division-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
            <h1> {{ $division->exists ? 'Éditer une Division ' : 'Ajouter une Division ' }} </h1>
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
            <form method="POST" action="{{ route($division->exists ? 'admin.division.update' : 'admin.division.store', ['division' => $division->id]) }}">
                @csrf
                @method($division->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="division" label="Division" type="text" name="division" placeholder="Division"  readonly="" value="{{ $division->division }}" />

                <x-input class="inputContainer fonction" id="sigle" label="Sigle" type="text" name="sigle" placeholder="Sigle"  readonly="" value="{{ $division->sigle }}" />

                <x-select class="inputContainer fonction" id="service_id" label="Service" name="service_id" :value="$services" elementIdOnEntite="{{ $division->service_id }}"/>

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $division->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
