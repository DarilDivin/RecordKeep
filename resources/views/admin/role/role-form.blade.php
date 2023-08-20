@extends('admin.layouts.template')

    @section('title')
        Admin-Role-Management
    @endsection

    @section('content')

    @php
        $roleName = str_replace("&#039;", "\'", $role->name );
        $routeName = request()->route()->getName();
    @endphp


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
            <h1> {{ $role->exists ? 'Éditer un Rôle' : 'Ajouter un Rôle' }} </h1>
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
            <form method="POST" action="{{ route($role->exists ? 'admin.role.update' : 'admin.role.store', ['role' => $role->id]) }}">
                @csrf
                @method($role->exists ? 'put' : 'post')

                <x-input class="inputContainer fonction" id="role" label="Libellé du Rôle" type="text" name="name" placeholder="Rôle"  readonly="" value="{{ $roleName }}" />

                <div class="inputContainer TomSelect" style="grid-column: 1 / span 3;">
                    <label for="permissions">Permissions</label>
                    <select name="permissions[]" id="permissions" multiple placeholder="Choisissez quelques permissions...">
                        @if ($routeName === 'admin.role.edit' && !is_null($role->permissions->toArray())))
                            @foreach ($permissions as $id => $permission)
                                <option @if(in_array($id, $role->permissions->pluck('id')->toArray())) selected @endif value="{{ $id }}">{{ $permission }}</option>
                            @endforeach
                        @else
                            @foreach ($permissions as $id => $permission)
                                <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }} >{{ $permission }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('roles')
                        <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $role->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
