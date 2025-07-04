@props(['type' => 'text', 'label', 'name', 'value', 'placeholder', 'required' => false, 'autocomplete' => false])

@isset($label)
    <label for="{{ $name }}">{{ $label }}</label>
@endisset
<input type="{{ $type }}" class="form-control @error($name)border-danger @enderror" title="{{ $label ?? $name }}"
    id="{{ $name }}" name="{{ $name }}"
    @isset($placeholder)
    placeholder="{{ $placeholder }}"
    @endisset
    required="{{ $required }}"
    @isset($value)
        value="{{ $value }}"
        @else
        value="{{ old($name) }}"
    @endisset
    />
@error($name)
    <span class="text-danger text-small">{{ $message }}</span>
@enderror
