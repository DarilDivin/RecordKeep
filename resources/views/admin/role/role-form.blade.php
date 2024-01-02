@extends('admin.layouts.template')

    @section('title')
        {{ $role->exists ? 'Éditer un Rôle' : 'Ajouter un Rôle' }}
    @endsection

    @section('content')

    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.role.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $role->exists ? 'Éditer un Rôle' : 'Ajouter un Rôle' }} </h1>
            <form method="POST" action="{{ route($role->exists ? 'admin.role.update' : 'admin.role.store', ['role' => $role->id]) }}">
                @csrf
                @method($role->exists ? 'put' : 'post')

                <x-input class="inputContainer fonction" id="role" label="Libellé du Rôle" type="text" name="name" placeholder="Rôle"  readonly="" value="{{ $role->name }}" />

                @livewire('role-dynamic-select', [
                    'role' => $role,
                    'typeroles' => $typeroles,
                    'permissions' => $permissions,
                    'rolePermissions' => $rolePermissions
                ])

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $role->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
