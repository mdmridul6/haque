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

                        @foreach ($plans as $plan)
                            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 my-2 ">
                                <div class="offer {{ $plan?->is_actived ? 'offer-success' : 'offer-default' }} text-center rounded-0 shadow mt-5">
                                    <div class="shape">
                                        <div class="shape-text mt-2  me-2">
                                            {{ $plan?->is_actived ? 'Top' : 'Regular' }}
                                        </div>
                                    </div>
                                    <div
                                        class="position-absolute start-50 translate-middle text-light rounded-circle px-5 py-3 {{ $plan?->is_actived ? 'bg-success' : 'bg-gray-dark' }}">
                                        <i class="{{ $plan?->badge_icon }} fs-1"></i>
                                    </div>
                                    <div class="card-body mt-5">
                                        <h2 class="pt-2 fw-bold">{{ $plan?->title }}</h2>
                                        <h3 class="card-text  pt-2"><x-taka>{{ $plan?->price }}/</x-taka><span
                                                class="text-title">{{ Str::ucfirst($plan?->duration) }}</span></h3>

                                        <ul class="list-group list-group-flush">
                                            @foreach ($plan?->features as $item)
                                                <li class="list-group-item">{{ $item }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-evenly">
                                            <x-edit-button href="{{ route('admin.plan.edit', $plan?->id) }}" />
                                            {{-- <x-show-button href="{{ route('admin.plan.show', $plan?->id) }}" /> --}}
                                            <x-delete-button href="{{ route('admin.plan.destroy', $plan?->id) }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection

@section('scripts')
@endsection
