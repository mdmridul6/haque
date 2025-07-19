@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-back-button href="{{ route('admin.product.index') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product Add</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-input name="name" label="Name" :value="old('name')" />
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <x-select-option name="brand_id" label="Brand" :options="$productBrand" valueField="id"
                                        titleField="name" />
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <x-select-option name="category_id" label="Category" :options="$productCategories" valueField="id"
                                        titleField="name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="number" name="price" label="Price" :value="old('price')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="number" name="quantity" label="Quantity" :value="old('quantity')" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-area  name="description" label="Description" :value="old('description')" />
                                </div>
                            </div>

                             <div class="col-md-12">
                                <div class="form-group">
                                    <x-file-uploder name="images" label="Images" :image_url="null" :multiple="true" />
                                </div>
                            </div>




                        </div>

                        <hr>
                        <h5>Seo</h5>
                        <hr>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="meta_title"
                                        label="Meta Title <span class='text-danger text-bold'>(Meta titles should be between 50-60 characters long)</span>"
                                        :value="old('meta_title')" />

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input name="meta_description"
                                        label="Meta Description <span class='text-danger text-bold'>(Meta descriptions should be between 150-160 characters)</span>"
                                        :value="old('meta_description')" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-input name="meta_keywords"
                                        label="Meta Keywords <span class='text-danger text-bold'>(Meta keywords should be between 3-5 keywords, separated by commas)</span>"
                                        :value="old('meta_keywords')" />
                                </div>
                            </div>



                            <div class="btn-list text-end">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>

                        </div>



                    </form>
                </div>
                <!-- END ROW -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
