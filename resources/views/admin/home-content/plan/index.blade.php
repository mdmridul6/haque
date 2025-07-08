@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-add-button href="{{ route('admin.plan.create') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h1 class="card-title">Plans</h1>

                </div>
                <div class="card-body">




                    <div class="row">
                        <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 my-2 ">
                            <div class="card text-center border-success rounded-0 shadow mt-5">
                                <div
                                    class="position-absolute start-50 translate-middle text-light rounded-circle px-5 py-3 bg-success">
                                    <i class="bi bi-gear-fill fs-1"></i>
                                </div>
                                <div class="card-body mt-5">
                                    <h2 class="pt-2 fw-bold">Pro</h2>
                                    <h3 class="card-text  pt-2"><x-taka>2</x-taka></h3>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                        <li class="list-group-item">A fourth item</li>
                                        <li class="list-group-item">And a fifth one</li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-evenly">
                                        <x-edit-button href="{{ route('admin.work-process.edit', 1) }}" />
                                        <x-show-button href="{{ route('admin.work-process.show', 1) }}" />
                                        <x-delete-button href="{{ route('admin.work-process.destroy', 1) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection

@section('scripts')
@endsection
