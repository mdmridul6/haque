@props(['type' => 'text', 'label', 'name', 'value', 'placeholder', 'required' => true])


@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-icons.min.css') }}">
@endpush
@isset($label)
    <label for="{{ $name }}">{{ $label }}@if ($required) <span class="text-danger">*</span> @endif</label>
@endisset
<input type="{{ $type }}" class="form-control iconpicker @error($name) border-danger @enderror" readonly
    title="{{ $label ?? $name }}" id="{{ $name }}" name="{{ $name }}"
    @isset($placeholder)
    placeholder="{{ $placeholder }}"
    @endisset
    @if ($required) required @endif
    @isset($value)
        value="{{ $value }}"
        @else
        value="{{ old($name) }}"
    @endisset
    aria-label="Icone Picker" aria-describedby="basic-addon1" />
@error($name)
    <span class="text-danger text-small">{{ $message }}</span>
@enderror
@push('scripts')
    <script src="{{ asset('build/assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/icon-picker/bootstrapicon-iconpicker.js') }}"></script>
    <script>
        $(function() {
            $('.iconpicker').iconpicker({
                position:"top",
                hideOnSelect:true,
                selectedCustomClass:"bg-success",


            });
        });
    </script>
@endpush
