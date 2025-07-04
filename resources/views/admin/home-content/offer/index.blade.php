@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Site Setting</h4>
                </div>
                <div class="card-body">

                    <div class="row">



                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <h5>Offer Contents</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.offer.store.content') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">

                                            <x-text-input name="offer_title" :value="$content->offer_title" label="Title" />
                                        </div>
                                        <div class="form-group">

                                            <x-text-input name="offer_subtitle" :value="$content->offer_subtitle" label="Sub-title" />
                                        </div>

                                        <div class="btn-list text-end">

                                            <button type="submit" class="btn btn-success">
                                                Save
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <h5>Offer {{ isset($offerContent) ? 'Edit' : 'Add' }}</h5>
                                </div>
                                <div class="card-body">
                                    <form
                                        action="{{ isset($offerContent) ? route('admin.offer.update', ['offerContent' => $offerContent->id]) : route('admin.offer.store') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf

                                        @if (isset($offerContent))
                                            @method('PUT')
                                        @endif
                                        <div class="form-group">

                                            <x-text-input name="order_number" type="number" :value="$offerContent->order_number ?? ''"
                                                label="Order Number" />
                                        </div>
                                        <div class="form-group">

                                            <x-icon-picker name="icon" label="Icon Class" :value="$offerContent->icon ?? ''" />
                                        </div>

                                        <div class="form-group">

                                            <x-text-input name="title" label="Title" :value="$offerContent->title ?? ''" />
                                        </div>
                                        <div class="form-group">

                                            <x-text-input name="sub_title" label="Sub-title" :value="$offerContent->sub_title ?? ''" />
                                        </div>


                                        <div class="btn-list text-end">

                                            @isset($offerContent)
                                                <a href="{{ route('admin.offer.index') }}"
                                                    class="btn btn-secondary ms-2">Cancel</a>
                                            @endisset

                                            <button type="submit" class="btn btn-success">
                                                Save
                                            </button>
                                        </div>
                                        <div style="height: 10vh"></div>
                                    </form>

                                </div>
                            </div>
                        </div>








                        <div class="col-md-12">


                            <div class="card">
                                <div class="card-header d-flex justify-content-between ">

                                    <div class="card-title">
                                        <h5>Offers</h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th colSpan="2">Title</th>

                                                <th>Subtitle</th>
                                                @if (!isset($offerContent))
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($offers as $offer)
                                                <tr>
                                                    <td>{{ $offer->order_number }}</td>
                                                    <td> <i class="{{ $offer->icon }}" aria-hidden="true"></i></td>
                                                    <td>{{ $offer->title }}</td>
                                                    <td>{{ Str::limit($offer->sub_title, 30, '...') }}

                                                        @if (!isset($offerContent))
                                                    <td class="d-flex justify-content-evenly">
                                                        <x-edit-button
                                                            href="{{ route('admin.offer.edit', ['offerContent' => $offer->id]) }}" />
                                                        <x-delete-button
                                                            href="{{ route('admin.offer.destroy', ['offerContent' => $offer->id]) }}" />
                                                    </td>
                                            @endif
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Offer Found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>


                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection
