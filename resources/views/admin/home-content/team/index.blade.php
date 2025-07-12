@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-add-button href="{{ route('admin.team.create') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Team List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Social Links</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="avatar cover-image br-2"
                                                data-bs-image-src="{{ asset($team?->image) }}"></span></td>
                                        <td>{{ $team?->name }}</td>
                                        <td>{{ $team?->designation }}</td>
                                        <td>
                                            @if ($team?->facebook_link)
                                                <a href="{{ $team?->facebook_link }}" target="_blank">Facebook</a>,
                                            @endif
                                            @if ($team?->linkedin_link)
                                                <a href="{{ $team?->linkedin_link }}" target="_blank">LinkedIn</a>,
                                            @endif
                                            @if ($team?->twitter_link)
                                                <a href="{{ $team?->twitter_link }}" target="_blank">Twitter</a>,
                                            @endif
                                            @if ($team?->instagram_link)
                                                <a href="{{ $team?->instagram_link }}" target="_blank">Instagram</a>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-around align-items-center">
                                            <x-edit-button href="{{ route('admin.team.edit', ['team' => $team?->id]) }}" />
                                            <x-delete-button :href="route('admin.team.destroy', ['team' => $team?->id])" />
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
