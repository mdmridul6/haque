@extends('home.layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightgallery-bundle.min.css') }}">

@endpush

@section('content')
    <!-- Start Breadcrumb
                                ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light"
        style="background-image: url({{ asset($content?->image) }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Product Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('products') }}">Product</a></li>
                        <li class="active">{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
                                ============================================= -->
    <div id="blog" class="blog-area bg-gray full-width single default-padding ">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-md-12 mb-5">
                        <div class="item row">

                            <div class="col-md-8">

                                <div class="thumb product-image" id="product-images">

                                    @foreach ($product?->images as $image)
                                        <a href="{{ asset($image?->image) }}" data-lg-size="1600-1067"
                                            class="product-image-item d-block" data-src="{{ asset($image?->image) }}">
                                            <img class="img-fluid mx-auto" src="{{ asset($image?->image) }}" alt="Thumb">
                                        </a>
                                    @endforeach
                                </div>
                                <div class="thumb product-image-nav">

                                    @foreach ($product?->images as $image)
                                        <img class="img-responsive nav-images" width="150px" src="{{ asset($image?->image) }}" alt="Thumb">
                                    @endforeach
                                </div>

                            </div>

                            <div class="info col-md-4">
                                <h3>{{ $product->name }}</h3>
                                {{-- <div class="meta">
                                    <ul>

                                        <li><i class="fas fa-calendar-alt "></i> {{ $blog?->created_at?->format('d M, Y') }}
                                        </li>

                                    </ul>
                                </div> --}}
                                <p>
                                    {!! $product?->description !!}
                                </p>
                                {{-- <div class="post-tags">
                                    <i class="fas fa-tags"></i>
                                    @foreach ($blog?->tags as $item)
                                        <a href="{{ route('blog', ['tag' => $item->slug]) }}">{{ $item?->name }}</a>
                                    @endforeach
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog -->
    @endsection
    @push('scripts')
        <script src="{{ asset('build/assets/plugins/gallery/lightgallery.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/lightgallery.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/lg-thumbnail.umd.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/lg-zoom.umd.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.product-image').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.product-image-nav'
                });
                $('.product-image-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.product-image',
                    dots: true,
                    centerMode: true,
                    focusOnSelect: true,
                    centerPadding: '60px',
                });
                lightGallery(document.getElementById('product-images'), {
                    thumbnail: true,
                    selector: '.product-image-item',
                    pager: false,
                    plugins: [lgZoom, lgThumbnail],
                    galleryId: "nature",
                });
            });
        </script>
    @endpush
