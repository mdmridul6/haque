@props(['type' => 'text', 'label', 'name', 'value', 'placeholder', 'required' => true, 'autocomplete' => false])

@isset($label)
    <label for="{{ $name }}">{{ $label }}@if ($required) <span class="text-danger">*</span> @endif</label>
@endisset
<textarea type="{{ $type }}" class="form-control content @error($name)border-danger @enderror" rows="6"
    title="{{ $label ?? $name }}" id="{{ $name }}" name="{{ $name }}"
    @isset($placeholder)
    placeholder="{{ $placeholder }}"
    @endisset
    @if ($required) required @endif wrap="soft">@isset($value){!! trim($value) !!}@else{!! trim(old($name)) !!}@endisset</textarea>
@error($name)
    <span class="text-danger text-small">{{ $message }}</span>
@enderror


@push('scripts')
 <!-- INTERNAL WYSIWYG EDITOR JS -->
        <script src="{{asset('build/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>

        <script>
            $('#{{ $name }}').richText({
                imageUpload: false,
                fileUpload: false,
                videoEmbed: false,
                audioEmbed: false,
                placeholder: 'Type your content here...',
                useParagraph: true,
                useClasses: true,
                useStyles: true,
                useFont: true,
                useAlignment: true,
                useLists: true,
                useColors: true,
                useIndent: true,
                useLinks: true,
                useTables: true,
                useCode: true,
                useUndoRedo: true,
                useFullscreen: true,
                useClearFormatting: true,
                useCustomHTML: true,
                useCustomCSS: true,
                useCustomJS: true,
                useCustomAttributes: true,
                useCustomClasses: true,
                useCustomStyles: true,
                useCustomFonts: true,
                useCustomAlignment: true,
                useCustomLists: true,
                useCustomColors: true,
                useCustomIndent: true,
                useCustomLinks: true,
                useCustomTables: true,
                useCustomCode: true,
                useCustomUndoRedo: true,
                useCustomFullscreen: true,
                useCustomClearFormatting: true,
                useCustomCustomHTML: true,
            });
        </script>
@endpush
