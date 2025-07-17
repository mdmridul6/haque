@extends('home.layouts.app')

@section('content')
    <!-- Start Breadcrumb
            ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light"
        style="background-image: url({{ asset($content?->image) }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li class="active">{{ $blog->title }}</li>
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
                        <div class="item">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset($blog?->image) }}" alt="Thumb">
                                <div class="tags">
                                    @foreach ($blog?->tags as $item)
                                        <a href="{{ route('blog', ['tag' => $item->slug]) }}">{{ $item?->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="info">
                                <h3>{{ $blog->title }}</h3>
                                <div class="meta">
                                    <ul>

                                        <li><i class="fas fa-calendar-alt "></i> {{ $blog?->created_at?->format('d M, Y') }}
                                        </li>

                                    </ul>
                                </div>
                                <p>
                                    {!! $blog?->content !!}
                                </p>
                                <div class="post-tags">
                                    <i class="fas fa-tags"></i>
                                    @foreach ($blog?->tags as $item)
                                        <a href="{{ route('blog', ['tag' => $item->slug]) }}">{{ $item?->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog -->
    @endsection
