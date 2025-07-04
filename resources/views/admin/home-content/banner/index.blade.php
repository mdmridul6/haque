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
                    <h4>Banner Setting</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-text-input label="Banner Title" :required="true" name="banner_title"
                                        :value="$content?->banner_title" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-text-input label="Banner Sub-Title" :required="true" name="banner_subtitle"
                                        :value="$content?->banner_subtitle" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-text-input type="url" label="Youtube Video Link" :required="true"
                                        name="youtube_video_url" :value="$content?->youtube_video_url" />
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-file-uploder label="Banner Image" :image_url="$content->banner_image" name="banner_image" />
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
