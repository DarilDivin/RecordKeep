@extends('admin.layouts.template')

    @section('title')
        {{ $service->exists ? 'Éditer un Service' : 'Ajouter un Service' }}
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.service.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $service->exists ? 'Éditer un Service' : 'Ajouter un Service' }} </h1>
            <form method="POST" action="{{ route($service->exists ? 'admin.service.update' : 'admin.service.store', ['service' => $service->id]) }}">
                @csrf
                @method($service->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="service" label="Service" type="text" name="service" placeholder="Service"  readonly="" value="{!! $service->service !!}" />

                <x-input class="inputContainer fonction" id="sigle" label="Sigle" type="text" name="sigle" placeholder="Sigle"  readonly="" value="{{ $service->sigle }}" />

                <x-select class="inputContainer fonction" id="direction_id" label="Direction" name="direction_id" :value="$directions" elementIdOnEntite="{{ $service->direction_id }}"/>

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $service->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
