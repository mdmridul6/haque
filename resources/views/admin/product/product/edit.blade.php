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
                    <h4>Product Edit</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">


                           <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-input name="name" label="Name" :value="old('name', $product->name)" />
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <x-select-option name="brand_id" label="Brand" :options="$productBrand" valueField="id"
                                        titleField="name" :values="old('brand_id', $product->brand_id)" />
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <x-select-option name="category_id" label="Category" :options="$productCategories" valueField="id"
                                        titleField="name" :values="old('category_id', $product->category_id)" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="number" name="price" label="Price" :value="old('price', $product->price)" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-text-input type="number" name="quantity" label="Quantity" :value="old('quantity', $product->quantity)" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-text-area  name="description" label="Description" :value="old('description', $product->description)" />
                                </div>
                            </div>


                             <div class="col-md-12">
                                <div class="form-group">
                                    <x-file-uploder name="images" label="Images" :values="$product->images" :multiple="true" value_field="image" index_field="id" />
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
