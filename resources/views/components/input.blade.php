<div class="{{ $class }}">
{{-- <div {{ $attributes->merge(['class' => 'inputContainer']) }}> --}}
    <label for="{{ $id }}">{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $id }}" cols="30" rows="10" {{ $readonly }}>{{ $value }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" id="{{ $id }}" {{ $readonly }} value="{{ $value }}"/>
    @endif
</div>
