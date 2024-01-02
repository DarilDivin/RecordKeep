<div style="width: 100%; grid-column: 1 / 4;">

    @php
        $routeName = request()->route()->getName();
    @endphp

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

    <div class="inputContainer TomSelect" style="grid-column: 1 / span 3; height: 210px;">
        <label for="permissions">Permission(s)</label>
        <select name="permissions[]" id="permissions" multiple placeholder="Choisissez quelques permissions..." wire:model="selectedPermissions" style="height: 100%;">
            @foreach ($permissions as $permission)
                <option value="{{ $permission['id'] }}" {{-- @if(old('permissions') && in_array($permission['id'], old('permissions'))) selected @endif --}}>{{ $permission['name'] }}</option>
            @endforeach
        </select>
        @error('permissions')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div>

    @if ($routeName === 'admin.role.edit')
        <hr>
        <h3>Les permissions accordés</h3>
        <div class="permissionsContainer">
            @foreach ($rolePermissions as $permission)
                <div class="permission">
                    <div class="permissionName">
                        <input type="checkbox" name="" id="permission{{ $permission['id'] }}" value="{{ $permission['id'] }}" checked>
                        <label for="permission{{ $permission['id'] }}">{{ $permission['name'] }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if (!is_null($alwaysPermissions))
        <br>
        <hr>
        <h3>Les permissions accordés</h3>
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
