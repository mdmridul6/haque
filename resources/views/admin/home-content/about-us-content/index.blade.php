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
                    <h4>About Us Content</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.about-us-content.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-input label="About Us Title" :required="true" name="about_us_title"
                                        :value="$content?->about_us_title" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-input label="About Us Sub-Title" :required="true" name="about_us_subtitle"
                                        :value="$content?->about_us_subtitle" />
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-file-uploder label="Clients Image" name="clients_image" :multiple="true" :values="$clients" value_field="images" index_field="id" />
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
    </div>
    <!-- END ROW -->
@endsection

