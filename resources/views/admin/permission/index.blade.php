@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" /><!-- End breadcrumb -->


        <x-add-button href="{{ route('admin.permission.create') }}" />
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Permissions</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-30p border-bottom-0">#</th>

                                    <th class="wd-30p border-bottom-0">Permission</th>
                                    <th class="wd-40p border-bottom-0 text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::title(Str::replaceFirst('.', ' ', $permission->name)) }}</td>
                                        <td class="d-flex justify-content-evenly">


                                            <x-edit-button
                                                href="{{ route('admin.permission.edit', ['permission' => $permission->id]) }}" />

                                            <x-delete-button
                                                href="{{ route('admin.permission.destroy', ['permission' => $permission->id]) }}" />
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
