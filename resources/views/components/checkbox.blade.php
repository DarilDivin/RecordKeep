<div class="{{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="checkbox" name="{{ $name }}" id="{{ $id }}">
</div>
@error($name)
    <span style="color: red;">{{ $message }}</span>
@enderror
