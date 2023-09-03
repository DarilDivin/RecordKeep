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
        <label for="permissions">Permissions</label>
        <select name="permissions[]" id="permissions" multiple placeholder="Choisissez quelques permissions..." wire:model="selectedPermissions" style="height: 100%;">
            @php
                $routeName = request()->route()->getName();
            @endphp
            @if ($routeName === 'admin.role.edit' && !empty($role->permissions->toArray()))
                @foreach ($permissions as $permission)
                    <option @if(in_array($permission['id'],$role->permissions->pluck('id')->toArray())) selected @endif value="{{ $permission['id'] }}">{{ $permission['name'] }}</option>
                @endforeach
            @else
                @foreach ($permissions as $permission)
                    <option value="{{ $permission['id'] }}">{{ $permission['name'] }}</option>
                @endforeach
            @endif
        </select>
        @error('permissions')
            <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
        @enderror
    </div> <br>

    @if ($routeName === 'admin.role.edit')
        <div class="permissionsContainer">
            @foreach ($permissions as $permission)
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
