@extends('admin.layouts.template')

    @section('title')
        Admin-Permission-Management
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
            <h1> {{ $permission->exists ? 'Éditer une Sous-Permission' : 'Ajouter une Sous-Permission' }} </h1>
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
            <form method="POST" action="{{ route($permission->exists ? 'admin.sous-permission.update' : 'admin.sous-permission.store', ['sous_permission' => $permission->id]) }}">
                @csrf
                @method($permission->exists ? 'put' : 'post')

                <x-input class="inputContainer fonction" id="permission" label="Libellé de la Sous-Permission" type="text" name="name" placeholder="Permission"  readonly="" value="{{ $permission->name }}" />

                <x-select class="inputContainer" id="permissions" label="Permission de la Sous-Permission" name="permission_id" :value="$permissions" elementIdOnEntite="{{ $permission->permission_id }}" />

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $permission->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
