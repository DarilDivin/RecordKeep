<div class="{{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="checkbox" name="{{ $name }}[]" id="{{ $id }}" value="{{ $value }}" @if(in_array($value, $ex)) checked @endif />
</div>
