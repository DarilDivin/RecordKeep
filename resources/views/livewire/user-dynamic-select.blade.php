<div style="width: 100%; grid-column: 1 / 4;">

    @php
        $routeName = request()->route()->getName()
    @endphp


    <div class="inputContainer requiredStar TomSelect role" wire:ignore>
        @if ($routeName === 'admin.user.edit')
            <div>
                <label>
                    Rôle(s) actuel(s) de l'utilisateur :
                    @foreach ($user->roles as $role)
                        {{ $role->name }} {{ $loop->last ? '.' : ',' }}
                    @endforeach
                </label>
            </div>
        @endif
        <label for="role">Rôle(s)</label>
        <select name="roles[]" id="role" multiple placeholder="Choisir les rôles" wire:model="selectedRoles">
            @if ($routeName === 'admin.user.edit' /* && !empty($user->roles->toArray()) */)
                @foreach ($roles as $id => $role)
                    <option {{-- @if(in_array($id,$user->roles->pluck('id')->toArray())) selected @endif  --}}  value="{{ $id }}">{{ $role }}</option>
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

    {{-- @if ($routeName === 'admin.user.edit' )
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
    @endif --}}

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
