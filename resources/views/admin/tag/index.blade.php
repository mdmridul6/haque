@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-add-button href="{{ route('admin.tag.create') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tag List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    
                                    <th>Name</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $tag?->name }}</td>

                                        <td class="d-flex justify-content-around align-items-center">
                                            <x-edit-button href="{{ route('admin.tag.edit', ['tag' => $tag?->id]) }}" />
                                            <x-delete-button :href="route('admin.tag.destroy', ['tag' => $tag?->id])" />
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
