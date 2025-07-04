@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Site Setting</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.home-content.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-3">
                                <label for="site_color">Site Color</label>
                                <div class="form-group">
                                    <input type="text" id="site_color" name="site_color"
                                        value="{{ $content->site_color ?? '#264653' }}"
                                        class="form-control color-field w-100">
                                </div>
                            </div>
                            <div class="form-group form-elements col-md-3">
                                <div class="form-label">Choose One:</div>
                                <div class="custom-controls-stacked d-flex flex-column align-content-center">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="title_or_logo"
                                            value="title" @checked(old('title_or_logo', $content->title_or_logo) == 'title') />
                                        <span class="custom-control-label">Site Title</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="title_or_logo"
                                            value="logo"@checked(old('title_or_logo', $content->title_or_logo) == 'logo') />
                                        <span class="custom-control-label">Site Logo</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input label="Site title" :value="$content->site_title" name="site_title" />
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-file-uploder label="Site Logo" :image_url="$content->site_logo" name="site_logo" />
                                </div>
                            </div>
                            <div class="btn-list text-end">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- END ROW -->
@endsection

@push('scripts')
    <script src="{{ asset('build/assets/plugins/coloris/coloris.min.js') }}"></script>

    <script>
        Coloris({
            el: '.color-field',
            wrap: true,
            rtl: false,
            theme: 'polaroid',
            themeMode: 'light',
            margin: 5,
            format: 'hex',
            formatToggle: false,
            alpha: true,
            forceAlpha: false,
            swatchesOnly: false,
            focusInput: true,
            selectInput: true,
            clearButton: false,
            clearLabel: 'Clear',
            closeButton: true,
            closeLabel: 'Close',
            swatches: [
                '#264653',
                '#2a9d8f',
                '#e9c46a',
                'rgb(244,162,97)',
                '#e76f51',
                '#d62828',
                'navy',
                '#07b',
                '#0096c7',
                '#00b4d880',
                'rgba(0,119,182,0.8)'
            ],
            inline: false,
            defaultColor: '#264653',
            onChange: (color, input) => console.log(color, input),

        });
    </script>
@endpush
