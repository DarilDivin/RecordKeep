<div class="{{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <input {{-- @checked(old($name, $id ?? false)) --}} type="checkbox" name="{{ $name }}[]" id="{{ $id }}" value="{{ $value }}">
</div>
@error($name)
    <span style="color: red;">{{ $message }}</span>
@enderror
