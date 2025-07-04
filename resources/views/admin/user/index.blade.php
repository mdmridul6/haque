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
            <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol><!-- End breadcrumb -->
        <div class="ms-auto">
            <x-add-button href="{{ route('admin.user.create') }}" />
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
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Full name</th>
                                    <th class="wd-25p border-bottom-0">E-mail</th>
                                    <th class="wd-20p border-bottom-0">Role</th>
                                    <th class="wd-15p border-bottom-0">Join date</th>
                                    <th class="wd-10p border-bottom-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="d-flex align-items-center">
                                            <span class="avatar cover-image br-2"
                                                data-bs-image-src="{{ asset($user->image) }}"></span>
                                            {{ $user->first_name . ' ' . $user->last_name }}
                                        </td>

                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{ $user?->getRoleNames()?->count() > 0 ? $user?->getRoleNames()?->join(',') : 'N/A' }}
                                        </td>
                                        <td>{{ date_format($user->created_at, 'd-M-Y') }}</td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group align-top br-7">


                                                <x-edit-button href="{{ route('admin.user.edit', ['user' => $user->id]) }}" />
                                                <x-delete-button
                                                    href="{{ route('admin.user.destroy', ['user' => $user->id]) }}" />
                                            </div>

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
