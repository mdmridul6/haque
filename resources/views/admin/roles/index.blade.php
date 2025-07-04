@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <ol class="breadcrumb mb-sm-0 mb-3">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
            <li class="breadcrumb-item">Administration</li>
            <li class="breadcrumb-item active" aria-current="page">Roles</li>
        </ol><!-- End breadcrumb -->

        <x-add-button href="{{ route('admin.roles.create') }}" />

    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Roles</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th class="wd-30p border-bottom-0">#</th>
                                    <th class="wd-30p border-bottom-0">Name</th>
                                    <th>Permissions</th>
                                    <th class="wd-40p border-bottom-0 text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $role)
                                    <tr id="row-{{ $role->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>


                                        <td>

                                            @foreach ($role->permissions->pluck('name') as $permission)
                                                <p class="badge  bg-primary me-1 my-1">
                                                    {{ Str::title(Str::replaceFirst('.', ' ', $permission)) }}</p>
                                            @endforeach
                                        </td>
                                        <td class="d-flex justify-content-evenly">
                                            <x-edit-button href="{{ route('admin.roles.edit', ['role' => $role->id]) }}" />
                                            <x-delete-button
                                                href="{{ route('admin.roles.destroy', ['role' => $role->id]) }}" />
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No roles found.</td>
                                    </tr>
                                @endforelse
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
