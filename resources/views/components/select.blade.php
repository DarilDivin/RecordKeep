<div class="{{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}">
        @foreach ($value as $id => $nom)
            <option @selected(old($name, $elementIdOnEntite) == $id) value="{{ $id }}">{{ $nom }}</option>
        @endforeach
    </select>
    @error($name)
        <span style="color: red;">{{ $message }}</span>
    @enderror
</div>

