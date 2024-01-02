<div style="width: 100%; grid-column: 1 / 4;">

    <div class="inputContainer">
        <label for="direction">Type de Rôle</label>
        <select class="inputContainer" id="typerole" wire:model="selectedTypeRole" name="type_role_id">
            @foreach ($typeroles as $id => $typerole)
                <option value="{{ $id }}">{{ $typerole }}</option>
            @endforeach
        </select>
        @error('type_role_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    @php
        $routeName = request()->route()->getName();
    @endphp

    <div class="inputContainer TomSelect" style="grid-column: 1 / span 3; height: 210px;">
        <label for="roles">Veuillez sélectionner les rôles que vous souhaitez accorder à cette permission</label>
        <select name="roles[]" id="roles" multiple placeholder="Choisissez quelques rôles..." wire:model="selectedRoles" style="height: 100%;">
            @foreach ($roles as $role)
                <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
            @endforeach
        </select>
        @error('roles')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div> <br>

    @if ($routeName === 'admin.permission.edit')
        <hr>
        <h3>Les permissions accordés</h3>
        <div class="permissionsContainer">
            @foreach ($permissionRoles as $role)
                <div class="permission">
                    <div class="permissionName">
                        <input type="checkbox" name="" id="role{{ $role['id'] }}" value="{{ $role['id'] }}" checked>
                        <label for="role{{ $role['id'] }}">{{ $role['name'] }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if (!is_null($alwaysRoles))
        <br>
        <hr>
        <h3>Les permissions accordés</h3>
        <div class="permissionsContainer">
            @foreach ($alwaysRoles as $role)
                <div class="permission">
                    <div class="permissionName">
                        <input type="checkbox" name="" id="role{{ $role['id'] }}" value="{{ $role['id'] }}" checked>
                        <label for="role{{ $role['id'] }}">{{ $role['name'] }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
