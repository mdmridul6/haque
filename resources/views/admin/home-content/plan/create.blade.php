@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-back-button href="{{ route('admin.plan.index') }}" />
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

                    <form action="{{ route('admin.plan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="title" label="Title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="price" label="Price" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-select-option name="duration" label="Duration" :options="$duration"
                                        valueField="duration" titleField="name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-icon-picker name="badge_icon" label="Button Title" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="button_text" label="Button Title" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold">Status</label>
                                    <select class="form-select form-control" name="is_actived" id="">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="order_number" label="Order Number" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Features</label>
                                    <div id="feature-wrapper">
                                        <div class="input-group mb-2">
                                            <input type="text" name="features[]" class="form-control"
                                                placeholder="Enter a feature">
                                            <button type="button" class="btn btn-danger remove-feature">Remove</button>
                                        </div>
                                    </div>
                                    <button type="button" id="add-feature" class="btn btn-outline-primary btn-sm">+ Add
                                        Feature</button>
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
    <script>
        $(document).ready(function() {
            $('#add-feature').click(function() {
                $('#feature-wrapper').append(`
            <div class="input-group mb-2">
                <input type="text" name="features[]" class="form-control" placeholder="Enter a feature">
                <button type="button" class="btn btn-danger remove-feature">Remove</button>
            </div>
        `);
            });

            // Remove feature
            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endpush
