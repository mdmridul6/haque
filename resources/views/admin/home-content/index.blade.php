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
                                            value="title" @checked(old('title_or_logo', $content?->title_or_logo) == 'title') />
                                        <span class="custom-control-label">Site Title</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="title_or_logo"
                                            value="logo"@checked(old('title_or_logo', $content?->title_or_logo) == 'logo') />
                                        <span class="custom-control-label">Site Logo</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input label="Site title" :value="$content?->site_title" name="site_title" />
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-file-uploder label="Site Logo" :image_url="$content?->site_logo" name="site_logo" />
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="tel" label="Primary Phone" :value="$content?->primary_phone" name="primary_phone" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="tel" label="Secondary Phone" :value="$content?->secondary_phone" name="secondary_phone" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="email" label="Email" :value="$content?->email" name="email" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="address" label="Address" :value="$content?->address" name="address" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="email" type="email" label="Support Email" :value="$content?->support_email" name="support_email" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="tel" label="Support Phone" :value="$content?->support_phone" name="support_phone" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  ">
                                    <x-text-input  label="Google Map Embed" :value="$content?->google_map_embed" name="google_map_embed" :required="false" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="url" label="Facebook Link <span class='text-primary fw-bold'>(Example: https://www.facebook.com/yourprofile)</span>" :value="$content?->facebook_link" name="facebook_link" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="url" label="Twitter Link <span class='text-primary fw-bold'>(Example: https://www.twitter.com/yourprofile)</span>" :value="$content?->twitter_link" name="twitter_link" :required="false" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="url" label="Instagram Link <span class='text-primary fw-bold'>(Example: https://www.instagram.com/yourprofile)</span>" :value="$content?->instagram_link" name="instagram_link" :required="false" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="url" label="LinkedIn Link <span class='text-primary fw-bold'>(Example: https://www.linkedin.com/in/yourprofile)</span>" :value="$content?->linkedin_link" name="linkedin_link" :required="false" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="url" label="FAQ Video Link <span class='text-primary fw-bold'>(Example: https://www.youtube.com/watch?v=yourvideo)</span>" :value="$content?->faq_video_link" name="faq_video_link" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="number" label="Satisfied Customers" :value="$content?->satisfied_customers" name="satisfied_customers" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="number" label="Years of Experience" :value="$content?->years_of_experience" name="years_of_experience" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="number" label="Projects Completed" :value="$content?->projects_completed" name="projects_completed" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="number" label="Awards Won" :value="$content?->awards_won" name="awards_won" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-area label="Terms and Conditions" :value="$content?->terms_and_conditions" name="terms_and_conditions" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-area label="Privacy Policy" :value="$content?->privacy_policy" name="privacy_policy" />
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
