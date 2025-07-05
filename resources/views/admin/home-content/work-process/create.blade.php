@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-back-button href="{{ route('admin.work-process.index') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Work Prcess Add</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.work-process.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="button_title" label="Button Title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="process_title" label="Process Title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-area name="process_description" label="Process Description" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-file-uploder name="image" label="Thumble" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_1_title" :required="false" label="Step 1 Title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_1_sub_title" :required="false" label="Step 1 Sort Description" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_2_title" :required="false" label="Step 2 Title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_2_sub_title" :required="false" label="Step 2 Sort Description" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_3_title" :required="false" label="Step 3 Title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_3_sub_title" :required="false" label="Step 3 Sort Description" />
                                </div>
                            </div>
                        </div>


                        <div class="btn-list text-end">
                            <button type="submit" class="btn btn-success">Save User</button>
                            <a href="{{ route('admin.work-process.index') }}" class="btn btn-secondary ms-2">Cancel</a>
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
