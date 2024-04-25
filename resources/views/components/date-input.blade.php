<div class="{{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label><input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" id="{{ $id }}" {{ $readonly }} value="{{ old($name, $value)  }}" {{ $max }}/>
    @error($name)
        <span style="color: red; font-size: 0.7rem">{{ $message }}</span>
    @enderror
</div>
