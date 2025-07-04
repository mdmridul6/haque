@props([
    'label',
    'name',
    'required' => false,
    'image_url' => null,
    'multiple' => false,
    'centered' => false,
    'values' => null,
    'value_field' => null,
    'index_field' => null,
])

<div>
    <div class="col-sm-12 col-md-12 mb-4 mb-lg-0 @if ($centered) mx-auto @endif">
        @isset($label)
            <label class="form-label" for="{{ $name }}">{{ $label }}</label>
        @endisset
        <div type="file" id="{{ $name }}" name="{{ $name }}" class="dropify"
            @if ($multiple) multiple @endif></div>
        @error($name)
            <span class="text-danger text-small">{{ $message }}</span>
        @enderror
    </div>
</div>

@push('scripts')
    <script src="{{ asset('build/assets/plugins/image-uploader/image-uploader.js') }}"></script>

    @if ($multiple)
        @if (isset($values))
            <script>
                let value_{{ $name }} = @json($values);
                const {{ $name }} = value_{{ $name }}.map((value) => {
                    return {
                        id: value.{{ $index_field }},
                        src: @js(asset('/')) + value.{{ $value_field }},

                    }
                });


                $(document).ready(function() {
                    $('#' + @js($name)).imageUploader({
                        imagesInputName: @js($name),
                        preloaded: {{ $name }},
                        multiple: true,
                        onError: (message) => {
                            $.growl.error({
                                message: message
                            });
                        }
                    });
                })
            </script>
        @else
            <script>
                $(document).ready(function() {
                    $('#' + @js($name)).imageUploader({
                        imagesInputName: @js($name),
                        multiple: true,
                        onError: (message) => {
                            $.growl.error({
                                message: message
                            });
                        }
                    });
                })
            </script>
        @endif
    @else
        @if (isset($image_url))
            <script>
                const {{ $name }} = [{
                    id: 1,
                    src: @js(asset($image_url))
                }, ]


                $(document).ready(function() {
                    $('#' + @js($name)).imageUploader({
                        imagesInputName: @js($name),
                        preloaded: {{ $name }},
                        onError: (message) => {
                            $.growl.error({
                                message: message
                            });
                        }

                    });
                })
            </script>
        @else
            <script>
                $(document).ready(function() {
                    $('#' + @js($name)).imageUploader({
                        imagesInputName: @js($name),

                        onError: (message) => {
                            $.growl.error({
                                message: message
                            });
                        }

                    });
                })
            </script>
        @endif
    @endif
@endpush
