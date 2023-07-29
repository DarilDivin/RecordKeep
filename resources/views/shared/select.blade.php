<div class="{{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}">
        @foreach ($elements as $key => $element)
            <option {{-- @selected(old($name, ) == $key) --}} value="{{ $key }}">{{ $element }}</option>
        @endforeach
    </select>
    @error($name)
        <span style="color: red;">{{ $message }}</span>
    @enderror
</div>

