@props([
    'label',
    'name',
    'options' => [],
    'values' => null,
    'required' => true,
    'autocomplete' => false,
    'valueField',
    'titleField',
    'multiple' => false,
])

@isset($label)
    <label for="{{ $name }}">{{ $label }} @if ($required) <span class="text-danger">*</span> @endif</label>
@endisset


@php
    $fieldName = $multiple ? $name . '[]' : $name;
@endphp

<select class="form-control select2-style" name="{{ $fieldName }}" id="{{ $name }}"
    @if ($multiple) multiple @endif data-placeholder="Choose One" @if ($required) required @endif>

    @foreach ($options as $item)
        <option value="{{ $item->$valueField }}"
            @if ($multiple)

            @if (in_array($item->name, old($name, $values ?? [])))
            selected
            @endif


            @else

            @if (old($name,$values) == $item->$valueField) selected @endif
            @endif



            >
            {{ $item->$titleField }}</option>
    @endforeach
</select>


@error($name)
    <span class="text-danger text-small">{{ $message }}</span>
@enderror

@push('scripts')
    <script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(".select2-style").select2({
            minimumResultsForSearch: '',
            width: '100%'
        });
    </script>
@endpush
