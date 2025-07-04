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
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.permission.index') }}">Permission</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol><!-- End breadcrumb -->
        <x-back-button href="{{ route('admin.permission.index') }}" title="Back to Permission List" />

    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Permission Create</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.permission.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <x-text-input name="name" />
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection

@section('scripts')
@endsection
