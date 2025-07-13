@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-add-button href="{{ route('admin.faq.create') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Faq List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="responsive-datatable">
                            <thead>
                                <tr>
                                   <th>Order</th>
                                   <th>Question</th>
                                      <th>Answer</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq?->order }}</td>
                                        <td>{{ $faq?->question }}</td>
                                        <td>{{ $faq?->answer }}</td>
                                        <td>
                                            <span class="badge {{ $faq?->status ? 'bg-success' : 'bg-danger' }}">
                                                {{ $faq?->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="d-flex gap-2 justify-content-evenly">
                                            <x-edit-button href="{{ route('admin.faq.edit', ['faq' => $faq?->id]) }}" />
                                            <x-delete-button href="{{ route('admin.faq.destroy', ['faq' => $faq?->id]) }}" />
                                                
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
