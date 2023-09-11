<div style="width: 100%; grid-column: 1 / 4;">
    <div class="inputContainer TomSelect role" wire:ignore>
        <label for="role">Rôle(s)</label>
        <select name="roles[]" id="role" multiple placeholder="Choisir les rôles" wire:model="selectedRole">
            @if (request()->route()->getName() === 'admin.user.edit' && !empty($user->roles->toArray()))
                @foreach ($roles as $id => $role)
                    <option @if(in_array($id,$user->roles->pluck('id')->toArray())) selected @endif  value="{{ $id }}">{{ $role }}</option>
                @endforeach
            @else
                @foreach ($roles as $id => $role)
                    <option value="{{ $id }}">{{ $role }}</option>
                @endforeach
            @endif
        </select>
        @error('roles')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    @if (request()->route()->getName() === 'admin.user.edit' )
        <hr>
        <h3>Les permissions disponibles</h3>
        <div class="permissionsContainer">
            @foreach ($userPermissions as $permission)
            <div class="permission">
                <div class="permissionName">
                    <input type="checkbox" name="permissions[]" id="permission{{ $permission['id'] }}" value="{{ $permission['id'] }}" checked>
                    <label for="permission{{ $permission['id'] }}">{{ $permission['name'] }}</label>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    @if (!empty($permissions))
        <hr>
        <h3>Les permissions disponibles</h3>
        <div class="permissionsContainer">
            @foreach ($permissions as $permission)
            <div class="permission">
                <div class="permissionName">
                    <input type="checkbox" name="permissions[]" id="permission{{ $permission['id'] }}" value="{{ $permission['id'] }}" checked>
                    <label for="permission{{ $permission['id'] }}">{{ $permission['name'] }}</label>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
