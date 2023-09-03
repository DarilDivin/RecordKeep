@extends('admin.layouts.template')

    @section('title')
        Admin-Permission-Management
    @endsection

    @section('content')

    @php
        $routeName = request()->route()->getName();
    @endphp


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.permission.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $permission->exists ? 'Éditer une Permission' : 'Ajouter une Permission' }} </h1>
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
            <form method="POST" action="{{ route($permission->exists ? 'admin.permission.update' : 'admin.permission.store', ['permission' => $permission->id]) }}">
                @csrf
                @method($permission->exists ? 'put' : 'post')

                <x-input class="inputContainer fonction" id="permission" label="Libellé de la Permission" type="text" name="name" placeholder="Permission"  readonly="" value="{{ $permission->name }}" />

                @livewire('permission-dynamic-select', [
                    'permission' => $permission,
                    'typeroles' => $typeroles,
                    'roles' => $roles,
                ])

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $permission->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
