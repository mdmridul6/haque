@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-add-button href="{{ route('admin.work-process.create') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0"></th>
                                    <th class="wd-15p border-bottom-0">Image</th>
                                    <th class="wd-15p border-bottom-0">Button Title</th>
                                    <th class="wd-25p border-bottom-0">Process Title</th>
                                    <th class="wd-20p border-bottom-0">Process Description</th>
                                    <th class="wd-10p border-bottom-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workProcesses as $workProcess)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="avatar avatar-lg cover-image br-2"
                                                data-bs-image-src="{{ asset($workProcess->image) }}"></span></td>
                                        <td>{{ $workProcess->button_title }}</td>
                                        <td>{{ Str::limit($workProcess->process_title,30,"...") }}</td>
                                        <td>{{ Str::limit($workProcess->process_description,30,"...") }}</td>
                                        <td class="d-flex justify-content-evenly align-item-center">
                                            <x-edit-button
                                                href="{{ route('admin.work-process.edit', ['work_process' => $workProcess->id]) }}" />
                                            <x-show-button
                                                href="{{ route('admin.work-process.show', ['work_process' => $workProcess->id]) }}" />
                                            <x-delete-button
                                                href="{{ route('admin.work-process.destroy', ['work_process' => $workProcess->id]) }}" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection

@section('scripts')
@endsection
