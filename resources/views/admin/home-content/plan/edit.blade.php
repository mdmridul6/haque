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
                    <h4>Work Prcess Edit</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.work-process.update',['work_process'=>$workProcess->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="button_title" label="Button Title" :value="$workProcess->button_title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="process_title" label="Process Title" :value="$workProcess->process_title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-area name="process_description" label="Process Description" :value="$workProcess->process_description" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-file-uploder name="image" label="Thumble" :image_url="$workProcess->image" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_1_title" :required="false" label="Step 1 Title"
                                        :value="$workProcess->type_1_title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_1_sub_title" :required="false" label="Step 1 Sort Description"
                                        :value="$workProcess->type_1_sub_title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_2_title" :required="false" label="Step 2 Title"
                                        :value="$workProcess->type_2_title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_2_sub_title" :required="false" label="Step 2 Sort Description"
                                        :value="$workProcess->type_2_sub_title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_3_title" :required="false" label="Step 3 Title"
                                        :value="$workProcess->type_3_title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="type_3_sub_title" :required="false"
                                        label="Step 3 Sort Description" :value="$workProcess->type_3_sub_title" />
                                </div>
                            </div>
                        </div>


                        <div class="btn-list text-end">
                            <button type="submit" class="btn btn-success">Save</button>
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
