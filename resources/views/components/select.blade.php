<div class="{{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}">
        <option value="{{ $value }}">{{ $value }}</option>
        <option value="{{ $value }}">{{ $value }}</option>
        <option value="{{ $value }}">{{ $value }}</option>
        <option value="{{ $value }}">{{ $value }}</option>
        <option value="{{ $value }}">{{ $value }}</option>
        <option value="{{ $value }}">{{ $value }}</option>
    </select>
    @error($name)
        <span style="color: red;">{{ $message }}</span>
    @enderror
</div>

