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



                        <div class="btn-list text-end">
                            <button type="submit" class="btn btn-success">Save User</button>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary ms-2">Cancel</a>
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
