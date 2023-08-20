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
            <span class="closeDocumentForm">
                <ion-icon name="arrow-back"></ion-icon>
            </span>
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

                <div class="inputContainer TomSelect" style="grid-column: 1 / span 3;">
                    <label for="roles">Rôles</label>
                    <select name="roles[]" id="roles" multiple placeholder="Entrer quelques rôles...">
                        @if ($routeName === 'admin.permission.edit' && !empty($permission->roles))
                            @foreach ($roles as $id => $role)
                                <option @if(in_array($id, $permission->roles->pluck('id')->toArray())) selected @endif value="{{ $id }}">{{ $role }}</option>
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

                <div class="inputContainer button">
                    <button type="submit">
                        {{ $permission->exists ? 'Éditer' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
