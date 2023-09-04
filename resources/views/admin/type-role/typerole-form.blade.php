@extends('admin.layouts.template')

    @section('title')
        {{ $typerole->exists ? 'Éditer un Type de Rôle' : 'Ajouter un Type de Rôle' }}
    @endsection

    @section('content')

    @php
        $routeName = request()->route()->getName();
    @endphp


    <div class="addDocumentFormContainer showForm">
        <div class="overlay"></div>
        <div class="addDocumentForm">
            <a href="{{ route('admin.type-role.index') }}">
                <span class="closeDocumentForm">
                    <ion-icon name="arrow-back"></ion-icon>
                </span>
            </a>
            <h1> {{ $typerole->exists ? 'Éditer un Type de Rôle' : 'Ajouter un Type de Rôle' }} </h1>
            <form method="POST" action="{{ route($typerole->exists ? 'admin.type-role.update' : 'admin.type-role.store', ['type_role' => $typerole->id]) }}">
                @csrf
                @method($typerole->exists ? 'put' : 'post')

                <x-input class="inputContainer fonction" id="typerole" label="Libellé du Type de Rôle" type="text" name="libelle" placeholder="Type de Rôle"  readonly="" value="{{ $typerole->libelle }}" />

                <div class="inputContainer TomSelect" style="grid-column: 1 / span 3;">
                    <label for="roles">Rôles</label>
                    <select name="roles[]" id="roles" multiple placeholder="Choisissez quelques rôles...">
                        @if ($routeName === 'admin.type-role.edit' && !is_null($typerole->severalroles->toArray())))
                            @foreach ($roles as $id => $role)
                                <option @if(in_array($id, $typerole->severalroles->pluck('id')->toArray())) selected @endif value="{{ $id }}">{{ $role }}</option>
                            @endforeach
                        @else
                            @foreach ($roles as $id => $role)
                                <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }} >{{ $role }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('roles')
                        <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inputContainer TomSelect" style="grid-column: 1 / span 3;">
                    <label for="permissions">Permissions</label>
                    <select name="permissions[]" id="permissions" multiple placeholder="Choisissez quelques permissions...">
                        @if ($routeName === 'admin.type-role.edit' && !is_null($typerole->severalpermissions->toArray())))
                            @foreach ($permissions as $id => $permission)
                                <option @if(in_array($id, $typerole->severalpermissions->pluck('id')->toArray())) selected @endif value="{{ $id }}">{{ $permission }}</option>
                            @endforeach
                        @else
                            @foreach ($permissions as $id => $permission)
                                <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }} >{{ $permission }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('permissions')
                        <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
                    @enderror
                </div>

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $typerole->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
