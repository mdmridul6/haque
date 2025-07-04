@props(['type' => 'text', 'label', 'name', 'value', 'placeholder', 'required' => true, 'autocomplete' => false])

@isset($label)
    <label for="{{ $name }}">{{ $label }}@if ($required) <span class="text-danger">*</span> @endif</label>
@endisset
<textarea type="{{ $type }}" class="form-control @error($name)border-danger @enderror" rows="6"
    title="{{ $label ?? $name }}" id="{{ $name }}" name="{{ $name }}"
    @isset($placeholder)
    placeholder="{{ $placeholder }}"
    @endisset
    @if ($required) required @endif wrap="soft">@isset($value){!! trim($value) !!}@else{!! trim(old($name)) !!}@endisset</textarea>
@error($name)
    <span class="text-danger text-small">{{ $message }}</span>
@enderror
