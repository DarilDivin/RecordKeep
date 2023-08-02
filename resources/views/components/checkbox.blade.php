<div class="{{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <input {{-- @checked(old($name, $id ?? false)) --}} type="checkbox" name="{{ $name }}[]" id="{{ $id }}" value="{{ $value }}">
</div>
