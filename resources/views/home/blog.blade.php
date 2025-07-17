
@extends('home.layouts.app')

@section('content')
    <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light"
        style="background-image: url({{asset($content?->banner_image)}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-width bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">

                    @foreach ($blogs as $blog)
 <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="single.html">
                                    <img src="{{ asset($blog?->image) }}" alt="Thumb">
                                </a>
                                <div class="tags">
                                    @foreach ($blog?->tags as $item)
                                        <a href="{{ route('blog', ['tag' => $item->slug]) }}">{{ $item?->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="{{ route('blog.details', ['blog' => $blog->slug]) }}">{{ $blog?->title }}</a>
                                </h4>
                                <div class="meta">
                                    <ul>

                                        <li><i class="fas fa-calendar-alt "></i> {{ $blog?->created_at->format('d M, Y') }}</li>

                                    </ul>
                                </div>
                                <p>
                                    {!! Str::limit($blog?->content, 100) !!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ route('blog.details', ['blog' => $blog->slug]) }}" class="more-btn">Read More <i
                                            class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @endforeach




                    <div class="col-md-12 pagi-area mx-auto">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Footer
    ============================================= -->
@endsection
