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

    <div class="inputContainer TomSelect" style="grid-column: 1 / span 3; height: 210px;">
        <label for="roles">Roles</label>
        <select name="roles[]" id="roles" multiple placeholder="Choisissez quelques rôles..." wire:model="selectedRoles" style="height: 100%;">
            @php
                $routeName = request()->route()->getName();
            @endphp
            @if ($routeName === 'admin.permission.edit' && !empty($permission->roles->toArray()))
                @foreach ($roles as $role)
                    <option @if(in_array($role['id'],$permission->roles->pluck('id')->toArray())) selected @endif value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                @endforeach
            @else
                @foreach ($roles as $role)
                    <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                @endforeach
            @endif
        </select>
        @error('roles')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div> <br>

    @if ($routeName === 'admin.permission.edit')
        <div class="permissionsContainer">
            @foreach ($roles as $role)
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
