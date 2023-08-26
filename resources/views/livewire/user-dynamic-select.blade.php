<div style="width: 100%; grid-column: 1 / 4;">
    <div class="inputContainer TomSelect role" wire:ignore>
        <label for="role">Rôle</label>
        <select name="roles[]" id="role" multiple placeholder="Choisir les rôles" wire:model="selectedRole">
            @foreach ($roles as $id => $role)
                <option value="{{ $id }}">{{ $role }}</option>
            @endforeach
        </select>
        @error('role')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <hr>

    <h3>Accorder les permissions</h3>
    <div class="permissionsContainer">
        @foreach ($permissions as $permission)
        <div class="permission">
            <div class="permissionName">
                <input type="checkbox" name="permissions[]" id="permission{{ $permission->id }}" value="{{ $permission->id }}" checked>
                <label for="permission{{ $permission->id }}">{{ $permission->name }}</label>
            </div>
        </div>
        @endforeach
    </div>
</div>
