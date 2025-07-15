@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-add-button href="{{ route('admin.blog.create') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Blog List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="avatar cover-image br-2"
                                                data-bs-image-src="{{ asset($blog->image) }}"></span></td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>
                                            @foreach ($blog->tags as $tag)
                                                <span class="badge bg-primary">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ Str::limit(strip_tags($blog->content), 50) }}</td>
                                        <td class="d-flex justify-content-around align-items-center">
                                            <x-edit-button href="{{ route('admin.blog.edit', ['blog' => $blog->id]) }}" />
                                            <x-delete-button :href="route('admin.blog.destroy', ['blog' => $blog->id])" />
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
