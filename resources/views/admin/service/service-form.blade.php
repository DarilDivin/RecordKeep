@extends('admin.layouts.template')

    @section('title')
        Admin-Service-Management
    @endsection

    @section('content')


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
            <h1> {{ $service->exists ? 'Éditer un Service' : 'Ajouter un Service' }} </h1>
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
            <form method="POST" action="{{ route($service->exists ? 'admin.service.update' : 'admin.service.store', ['service' => $service->id]) }}">
                @csrf
                @method($service->exists ? 'put' : 'post')
                <x-input class="inputContainer fonction" id="service" label="Service" type="text" name="service" placeholder="Service"  readonly="" value="{{ $service->service }}" />

                <x-input class="inputContainer fonction" id="sigle" label="Sigle" type="text" name="sigle" placeholder="Sigle"  readonly="" value="{{ $service->sigle }}" />

                <x-select class="inputContainer fonction" id="direction_id" label="Direction" name="direction_id" :value="$directions"/>

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $service->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
