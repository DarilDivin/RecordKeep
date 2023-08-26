<div style="width: 100%; grid-column: 1 / 4;">

    <div class="inputContainer">
        <label for="direction">Type de Rôle</label>
        <select class="inputContainer" id="typerole" wire:model="selectedTypeRole" name="type_role_id">
            @foreach ($typeroles as $id => $typerole)
                <option {{-- @selected(old('type_role_id', $role->type_role_id) == $id)  --}} value="{{ $id }}">{{ $typerole }}</option>
            @endforeach
        </select>
        @error('direction_id')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    <div class="inputContainer TomSelect" style="grid-column: 1 / span 3; height: 210px;">
        <label for="permissions">Permissions</label>
        <select name="permissions[]" id="permissions" multiple placeholder="Choisissez quelques permissions..." wire:model="selectedPermissions" style="height: 100%;">
            {{-- @if ($routeName === 'admin.role.edit' && !is_null($role->permissions->toArray())))
                @foreach ($permissions as $id => $permission)
                    <option @if(in_array($id, $role->permissions->pluck('id')->toArray())) selected @endif value="{{ $id }}">{{ $permission }}</option>
                @endforeach
            @else

            @endif --}}
            @foreach ($permissions as $key => $permission)
                <option value="{{ $permission['id'] }}" {{-- {{ in_array($id, old('permissions', [])) ? 'selected' : '' }} --}} >{{ $permission['name'] }}</option>
            @endforeach
        </select>
        @error('roles')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div> <br>

    @if (!is_null($alwaysPermissions))
        <div class="permissionsContainer">
            @foreach ($alwaysPermissions as $permission)
            <div class="permission">
                <div class="permissionName">
                    <input type="checkbox" name="" id="permission{{ $permission['id'] }}" value="{{ $permission['id'] }}" checked>
                    <label for="permission{{ $permission['id'] }}">{{ $permission['name'] }}</label>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
