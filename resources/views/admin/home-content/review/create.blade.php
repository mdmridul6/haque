@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-back-button href="{{ route('admin.review.index') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Review Member Add</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.review.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-file-uploder name="image" label="Image"  />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="name" label="Name" :value="old('name')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="designation" label="Designation" :value="old('designation')" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-area name="review" label="Review" :value="old('review')" />
                                </div>
                            </div>

                            <div class="btn-list text-end">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('admin.review.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>

                        </div>


                    </form>
                </div>
                <!-- END ROW -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
