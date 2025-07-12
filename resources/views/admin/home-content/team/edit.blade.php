@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-back-button href="{{ route('admin.team.index') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>team Edit</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.team.update', ['team' => $team?->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-file-uploder name="image" label="Image" :image_url="$team?->image" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="name" label="Name" :value="$team?->name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="designation" label="Designation" :value="$team?->designation" />

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-text-input name="facebook_link" type="url"
                                        label="Facebook Profile Link <span class='text-primary fw-bold'>(Example: https://www.facebook.com/yourprofile)</span>"
                                        :value="$team?->facebook_link" :required="false" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-text-input name="linkedin_link" type="url"
                                        label="LinkedIn Profile Link <span class='text-primary fw-bold'>(Example: https://www.linkedin.com/in/yourprofile)</span>"
                                        :value="$team?->linkedin_link" :required="false" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-text-input name="twitter_link" type="url"
                                        label="Twitter Profile Link <span class='text-primary fw-bold'>(Example: https://twitter.com/yourprofile)</span>"
                                        :value="$team?->twitter_link" :required="false" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <x-text-input name="instagram_link" type="url"
                                        label="Instagram Profile Link <span class='text-primary fw-bold'>(Example: https://www.instagram.com/yourprofile)</span>"
                                        :value="$team?->instagram_link" :required="false" />
                                </div>
                            </div>
                        </div>

                        <div class="btn-list text-end">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('admin.plan.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection

@push('scripts')
@endpush
