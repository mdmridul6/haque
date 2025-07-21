@extends('home.layouts.app')

@section('content')
    <!-- Start Banner============================================= -->
    <div class="banner-area text-center text-normal text-light shadow dark bg-fixed" id="home"
        style="background-image: url({{ asset($content?->banner_image) }});">
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="content">
                                <h1>{{ $content?->banner_title }}</h1>
                                <p>
                                    {{ $content?->banner_subtitle }}
                                </p>
                                <a class="popup-youtube light video-play-button item-center"
                                    href="{{ $content?->youtube_video_url }}">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wavesshape">
                    <img src="{{ asset('frontend/assets/img/waves-shape.svg') }}" alt="Shape">
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->


    @if (isset($content?->about_us_title) && isset($content?->about_us_subtitle))
        <!-- Start Companies Area============================================= -->
        <div class="companies-area default-padding" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-{{ isset($clients) ? 6 : 12 }} info">
                        <h3>{!! $content?->about_us_title !!}</h3>
                        <p>
                            {{ $content?->about_us_subtitle }}
                        </p>
                    </div>
                    @if (isset($clients) && count($clients) > 0)
                        <div class="col-md-6 clients">
                            <div class="clients-items owl-carousel owl-theme text-center">

                                @foreach ($clients as $client)
                                    <div class="single-item">
                                        <a href="#"><img src="{{ asset($client->images) }}" alt="Clients"></a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- End Companies Area -->
    @endif




    @if (isset($offerContents) && count($offerContents))
        <!-- Start We Offer Section -->
        <section id="features" class="we-offer-area item-border-less bg-gray default-padding bottom-less">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="site-heading">
                            <h2>{{ $content?->offer_title }}</h2>
                            <h4>{{ $content?->offer_subtitle }}</h4>
                        </div>
                    </div>
                </div>

                @php
                    $total = count($offerContents);
                    $itemsPerRow = 3;
                    $fullRows = floor($total / $itemsPerRow);
                    $lastRowCount = $total % $itemsPerRow;
                @endphp

                {{-- Loop through full rows --}}
                @for ($i = 0; $i < $fullRows * $itemsPerRow; $i++)
                    @if ($i % $itemsPerRow === 0)
                        <div class="row">
                    @endif

                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item text-center">
                            <span class="number">{{ $offerContents[$i]->order_number }}</span>
                            <i class="{{ $offerContents[$i]->icon }}"></i>
                            <h4>{{ $offerContents[$i]->title }}</h4>
                            <p>{{ $offerContents[$i]->sub_title }}</p>
                        </div>
                    </div>

                    @if ($i % $itemsPerRow === $itemsPerRow - 1)
            </div>
    @endif
    @endfor


    @if ($lastRowCount > 0)
        <div class="row text-center">
            @php
                $start = $fullRows * $itemsPerRow;
                $offset = $lastRowCount === 1 ? 4 : ($lastRowCount === 2 ? 2 : 0);
            @endphp

            @for ($j = 0; $j < $lastRowCount; $j++)
                <div class="col-md-4 col-sm-6 equal-height {{ $j === 0 ? 'col-md-offset-' . $offset : '' }}">
                    <div class="item text-center">
                        <span class="number">{{ $offerContents[$start + $j]->order_number }}</span>
                        <i class="{{ $offerContents[$start + $j]->icon }}"></i>
                        <h4>{{ $offerContents[$start + $j]->title }}</h4>
                        <p>{{ $offerContents[$start + $j]->sub_title }}</p>
                    </div>
                </div>
            @endfor
        </div>
    @endif

    </div>
    </section>
    @endif




    <!-- Start Overview============================================= -->


    @if (isset($workProcesses) && count($workProcesses) > 0)
        <div id="overview" class="work-list-area default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h2>How <span>we work</span></h2>
                            <h4>Checkout Our amazing working Process</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 overview-items">
                        <!-- Tab Nav -->
                        <div class="tab-navigation text-center">
                            <ul class="nav nav-pills">

                                @foreach ($workProcesses as $workProcess)
                                    <li @if ($loop->first) class="active" @endif>

                                        <a data-toggle="tab" href="#{{ Str::slug($workProcess?->button_title) }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ $workProcess?->button_title }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- End Tab Nav -->
                        <!-- Start Tab Content -->
                        <div class="row">
                            <div class="tab-content">
                                @foreach ($workProcesses as $workProcess)
                                    <!-- Start Single Item -->
                                    <div id="{{ Str::slug($workProcess?->button_title) }}"
                                        class="tab-pane fade @if ($loop->first) active @endif in">
                                        <div class="col-md-6 thumb">
                                            <img src="{{ asset($workProcess?->image) }}" alt="Thumb">
                                        </div>
                                        <div class="col-md-6 info">
                                            <h3>{{ $workProcess?->process_title }}
                                            </h3>
                                            <p>
                                                {!! $workProcess?->process_description !!}
                                            </p>

                                            <ul>
                                                @if ($workProcess?->type_1_title && $workProcess?->type_1_sub_title)
                                                    <li>
                                                        <h4> {{ $workProcess?->type_1_title }}</h4>
                                                        {{ $workProcess?->type_1_sub_title }}
                                                    </li>
                                                @endif

                                                @if ($workProcess?->type_2_title && $workProcess?->type_2_sub_title)
                                                    <li>
                                                        <h4> {{ $workProcess?->type_2_title }}</h4>
                                                        {{ $workProcess?->type_2_sub_title }}
                                                    </li>
                                                @endif
                                                @if ($workProcess?->type_3_title && $workProcess?->type_3_sub_title)
                                                    <li>
                                                        <h4> {{ $workProcess?->type_3_title }}</h4>
                                                        {{ $workProcess?->type_3_sub_title }}
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                @endforeach



                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- End Overview -->



    @if (isset($content?->satisfied_customers) ||
            isset($content?->years_of_experience) ||
            isset($content?->projects_completed) ||
            isset($content?->awards_won))
        <!-- Start Fun Factor============================================= -->
        <div class="fun-factor-area shadow dark bg-fixed text-light default-padding"
            style="background-image: url({{ asset($content?->banner_image) }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 fun-fact-items">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="{{ $content?->satisfied_customers }}" data-speed="5000">
                                    </div>
                                    <span class="medium">Satisfied customers</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="{{ $content?->years_of_experience }}" data-speed="5000">
                                    </div>
                                    <span class="medium">Years of experience</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="{{ $content?->projects_completed }}" data-speed="5000">
                                    </div>
                                    <span class="medium">Projects completed</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="{{ $content?->awards_won }}" data-speed="5000"></div>
                                    <span class="medium">Awards won</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Fun Factor -->
    @endif

    @if (isset($products) && count($products) > 0)
        <!-- Start Blog============================================= -->
        <div id="product" class="product-area bg-gray default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h2>Latest <span>Product</span></h2>
                            <h4>Have a look to our latest Product</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-items product-carousel owl-carousel owl-theme">

                            @foreach ($products as $product)
                                <!--  Single Item -->
                                <div class="item">
                                    <div class="thumb">
                                        <a href="{{ route('product.details', ['product' => $product?->slug]) }}">
                                            <img src="{{ asset($product?->images->first()->image) }}" alt="Thumb">
                                        </a>
                                        <div class="tags">

                                                <a href="#">{{ $product?->category?->name }}</a>
                                                <a href="#">{{ $product?->brand?->name }}</a>


                                        </div>
                                    </div>
                                    <div class="info">
                                        <h4>
                                            <a href="{{ route('product.details', ['product' => $product?->slug]) }}">{{ $product?->name }}</a>
                                        </h4>
                                        <p>
                                            {!! Str::limit(strip_tags($product->description), 50) !!}
                                        </p>
                                        <div class="info d-flex justify-content-between align-items-baseline">
                                            <h4 class="price-info"><x-taka></x-taka>{{ $product?->price }}
                                            </h4>
                                            <a href="{{ route('product.details', ['product' => $product?->slug]) }}"
                                                class="btn btn-theme effect btn-sm mt-0">View</a>
                                        </div>
                                    </div>
                                </div>
                                <!--  End Single Item -->
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="d-flex justify-content-center" style="margin-top:20px!important;">
                            <a class="btn btn-theme effect btn-sm" href="{{ route('blog') }}">Show All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog -->
    @endif




    @if (isset($plans) && count($plans) > 0)
        <section id="pricing" class="pricing-area bg-gray default-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="site-heading">
                            <h2>Pricing <span>Plan</span></h2>
                            <h4>List of our pricing packages</h4>
                        </div>
                    </div>
                </div>

                @php
                    $total = count($plans);
                    $itemsPerRow = 3;
                    $fullRows = floor($total / $itemsPerRow);
                    $lastRowCount = $total % $itemsPerRow;
                @endphp

                {{-- Full rows --}}
                @for ($i = 0; $i < $fullRows * $itemsPerRow; $i++)
                    @if ($i % $itemsPerRow === 0)
                        <div class="row text-center">
                    @endif

                    <div class="col-md-4 col-sm-6">
                        <div class="pricing-item {{ $plans[$i]->is_actived ? 'active' : '' }}">
                            <ul>
                                <li class="icon"><i class="{{ $plans[$i]->badge_icon }}"></i></li>
                                <li class="pricing-header">
                                    <h4>{{ $plans[$i]->title }}</h4>
                                    <h3><sup><x-taka></x-taka></sup>{{ $plans[$i]->price }}
                                        <sub>{{ $plans[$i]->duration }}</sub>
                                    </h3>
                                </li>


                                @foreach ($plans[$i]->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                                <li class="footer"><a class="btn btn-theme effect btn-sm" href="#">Get Started</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    @if ($i % $itemsPerRow === $itemsPerRow - 1)
            </div>
    @endif
    @endfor

    {{-- Last incomplete row (1–3 items, center aligned) --}}
    @if ($lastRowCount > 0)
        <div class="row text-center">
            @php
                $start = $fullRows * $itemsPerRow;
                $offset = $lastRowCount === 1 ? 4.5 : ($lastRowCount === 2 ? 2 : ($lastRowCount === 3 ? 1.5 : 0));
            @endphp

            @for ($j = 0; $j < $lastRowCount; $j++)
                <div class="col-md-4 col-sm-6 {{ $j === 0 && $offset ? 'col-md-offset-' . floor($offset) : '' }}">
                    <div class="pricing-item {{ $plans[$start + $j]->is_actived ? 'active' : '' }}">
                        <ul>
                            <li class="icon"><i class="{{ $plans[$start + $j]->badge_icon }}"></i></li>
                            <li class="pricing-header">
                                <h4>{{ $plans[$start + $j]->title }}</h4>
                                <h3><sup><x-taka></x-taka></sup>{{ $plans[$start + $j]->price }} <sub>
                                        {{ $plans[$start + $j]->duration }}</sub></h3>
                            </li>
                            @foreach ($plans[$start + $j]->features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                            <li class="footer"><a class="btn btn-theme effect btn-sm" href="#">Get Started</a></li>
                        </ul>
                    </div>
                </div>
            @endfor
        </div>
    @endif
    </div>
    </section>
    @endif


    @if ($teams->isNotEmpty())
        <!-- Start Team ============================================= -->
        <div id="team" class="team-area default-padding bottom-less">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h2>Innovative <span>Team</span></h2>
                            <h4>Meet our awesome and expert team members</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="team-items d-flex justify-content-center flex-wrap">
                        @foreach ($teams as $team)
                            <div class="col-md-6 col-lg-3 col-xl-3 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ asset($team?->image) }}" alt="Thumb">
                                        <div class="overlay">
                                            <h4>Connect us with</h4>
                                            {{-- <p>
                                                Jointure goodness interest debating did outweigh. Is time from them full my
                                                gone in
                                                went Of no introduced
                                            </p> --}}
                                            <div class="social">
                                                <ul>
                                                    @if (isset($team?->facebook_link))
                                                        <li class="facebook">
                                                            <a href="{{ $team?->facebook_link }}" target="_blank"><i
                                                                    class="fab fa-facebook"></i></a>
                                                        </li>
                                                    @endif
                                                    @if (isset($team?->twitter_link))
                                                        <li class="twitter">
                                                            <a href="{{ $team?->twitter_link }}" target="_blank"><i
                                                                    class="fab fa-twitter"></i></a>
                                                        </li>
                                                    @endif
                                                    @if (isset($team?->linkedin_link))
                                                        <li class="vimeo">
                                                            <a href="{{ $team?->linkedin_link }}" target="_blank"><i
                                                                    class="fab fa-linkedin"></i></a>
                                                        </li>
                                                    @endif
                                                    @if (isset($team?->instagram_link))
                                                        <li class="instagram">
                                                            <a href="{{ $team?->instagram_link }}" target="_blank"><i
                                                                    class="fab fa-instagram"></i></a>
                                                        </li>
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="message">
                                            <a href="#"><i class="fas fa-envelope-open"></i></a>
                                        </span>
                                        <h4>{{ $team?->name }}</h4>
                                        <span>{{ $team?->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- End Team -->
    @endif


    @if (isset($reviews) && count($reviews) > 0)
        <!-- Start Testimonials============================================= -->
        <div class="testimonials-area bg-gray default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h2>Customer <span>Review</span></h2>
                            <h4>What people say about us</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="testimonial-items owl-carousel owl-theme">

                                @foreach ($reviews as $review)
                                    <!-- Single Item -->
                                    <div class="testimonial-item">
                                        <div class="thumb col-md-4">
                                            <img src="{{ asset($review?->image) }}" alt="Thumb">
                                        </div>
                                        <div class="info col-md-8">
                                            <div class="content">
                                                <p>
                                                    {!! $review?->review !!}
                                                </p>
                                                <h4>{{ $review?->name }}</h4>
                                                <span>{{ $review?->designation }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonials -->
    @endif

    @if (isset($faqs) && count($faqs) > 0)
        <!-- Start Faq============================================= -->
        <div class="faq-area default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h2>Qustion and <span>Answer</span></h2>
                            <h4>Most common and important answer</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Star Video Faq -->
                    <div class="col-md-{{ isset($content?->faq_video_link) ? '6' : '12' }} video-faq">
                        <div class="video">
                            <img src="{{ asset($content?->banner_image) }}" alt="Thumb">
                            <a class="popup-youtube light video-play-button" href="{{ $content?->faq_video_link }}">
                                <i class="fa fa-play"></i>
                            </a>
                            <h4>Answer with video</h4>
                        </div>
                    </div>
                    <!-- End Video Faq -->

                    <!-- Star Accordion Items -->
                    <div class="col-md-{{ isset($content?->faq_video_link) ? '6' : '12' }} faq-items">
                        <div class="acd-items acd-arrow">
                            <div class="panel-group symb" id="accordion">


                                @foreach ($faqs as $faq)
                                    <!-- Single Item -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                    href="#ac_{{ $loop->iteration }}">
                                                    <span>{{ $loop->iteration }}</span> {{ $faq?->question }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="ac_{{ $loop->iteration }}"
                                            class="panel-collapse collapse @if ($loop->first) in @endif ">
                                            <div class="panel-body">
                                                {!! $faq?->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                @endforeach
                            </div>
                        </div>
                        <!-- End Accordion -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Faq  -->
    @endif


    @if (isset($blogs) && count($blogs) > 0)
        <!-- Start Blog============================================= -->
        <div id="blog" class="blog-area bg-gray default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h2>Latest <span>Blog</span></h2>
                            <h4>Have a look to our latest blog</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-items blog-carousel owl-carousel owl-theme">

                            @foreach ($blogs as $blog)
                                <!--  Single Item -->
                                <div class="item">
                                    <div class="thumb">
                                        <a href="single.html">
                                            <img src="{{ $blog?->image }}" alt="Thumb">
                                        </a>
                                        <div class="tags">
                                            @foreach ($blog?->tags as $tags)
                                                <a href="#">{{ $tags->name }}</a>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="info">
                                        <h4>
                                            <a href="#">{{ $blog?->title }}</a>
                                        </h4>
                                        <div class="meta">
                                            <ul>
                                                {{-- <li><a href="#"><i class="fas fa-user"></i> User</a></li> --}}
                                                <li><i class="fas fa-calendar-alt "></i>
                                                    {{ date('Y M d', strtotime($blog?->created_at)) }}</li>
                                                {{-- <li><a href="#"><i class="fas fa-comments"></i> 23</a></li> --}}
                                            </ul>
                                        </div>
                                        <p>
                                            {!! Str::limit(strip_tags($blog->content), 50) !!}
                                        </p>
                                        <div class="read-more">
                                            <a href="{{ route('blog.details', ['blog' => $blog?->slug]) }}"
                                                class="more-btn">Read More <i class="fas fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!--  End Single Item -->
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="d-flex justify-content-center" style="margin-top:20px!important;">
                            <a class="btn btn-theme effect btn-sm" href="{{ route('blog') }}">Show All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog -->
    @endif


    <!-- Start Contact Area ============================================= -->
    <div id="contact" class="contact-us-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Contact <span>Us</span></h2>
                        <h4>Do you Have Any Questions?</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-{{ isset($content) ? 8 : 12 }} contact-form">
                    <h2>Let's talk about your idea</h2>
                    <form action="{{ route('contact-us.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name"
                                        type="text">
                                    <span class="alert-error-name text-danger">

                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email*"
                                        type="email">
                                    <span class="alert-error-email text-danger">

                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                        type="text">
                                    <span class="alert-error-phone text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group comments">
                                    <textarea class="form-control" id="message" name="message" placeholder="Tell Us About Project *"></textarea>
                                </div>
                                <span class="alert-error-message text-danger">
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <button type="submit" name="submit" id="submit">
                                    Send Message <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Alert Message -->
                        <div class="col-md-12 alert-notification">
                            <div id="alert" class="alert-msg"></div>
                        </div>
                    </form>
                </div>

                @if (isset($content))
                    <div class="col-md-4 address">
                        <div class="address-items">
                            <ul class="info">
                                <li>
                                    <h4>Office Location</h4>
                                    <div class="icon"><i class="fas fa-map-marked-alt"></i></div>
                                    <span>{{ $content->address }}</span>
                                </li>
                                <li>
                                    <h4>Phone</h4>
                                    <div class="icon"><i class="fas fa-phone"></i></div>
                                    <span>{{ $content->primary_phone }}<br>{{ $content->secondary_phone }}</span>
                                </li>
                                <li>
                                    <h4>Email</h4>
                                    <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                    <span>{{ $content->email }}<br>{{ $content->support_email }}</span>
                                </li>
                            </ul>
                            <h4>Social Address</h4>
                            <ul class="social">
                                @if (isset($content->facebook_link) && $content->facebook_link)
                                    <li class="facebook">
                                        <a href="{{ $content->facebook_link }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                @endif
                                @if (isset($content->twitter_link) && $content->twitter_link)
                                    <li class="twitter">
                                        <a href="{{ $content->twitter_link }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                @endif
                                @if (isset($content->linkedin_link) && $content->linkedin_link)
                                    <li class="linkedin">
                                        <a href="{{ $content->linkedin_link }}" target="_blank"><i
                                                class="fab fa-linkedin"></i></a>
                                    </li>
                                @endif
                                @if (isset($content->instagram_link) && $content->instagram_link)
                                    <li class="instagram">
                                        <a href="{{ $content->instagram_link }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endif




            </div>
        </div>
    </div>
    <!-- End Contact -->

    @if (isset($content?->google_maps) && $content?->google_maps)
        <!-- Start Google Maps============================================= -->
        <div class="maps-area">
            <div class="container-full">
                <div class="row">
                    <div class="google-maps">
                        {!! $content->google_maps !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Google Maps -->
    @endif
@endsection


@push('scripts')
    <script>
        /* ==================================================  Contact Form Field Reset ===============================================*/



        /* ==================================================
            Contact Form Validations
        ================================================== */
        $('.contact-form').each(function() {
            var formInstance = $(this);
            formInstance.submit(function() {

                var action = $(this).attr('action');

                $("#alert").slideUp(750, function() {
                    $('#alert').hide();

                    $('#submit').attr('disabled', 'disabled');
                    $.ajax({
                        type: "POST",
                        url: action,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            name: $('#name').val(),
                            email: $('#email').val(),
                            phone: $('#phone').val(),
                            message: $('#message').val()
                        },
                        dataType: "json",
                        success: function(data) {

                            document.getElementById('alert').innerHTML = data.message;
                            $('#alert').slideDown('slow');
                            $('.contact-form img.loader').fadeOut('slow', function() {
                                $(this).remove()
                            });
                            $('#submit').removeAttr('disabled');

                            if (data.status) {
                                formInstance[0].reset(); // Reset the form fields
                            }

                        },
                        error: function(error) {


                            $('#alert').slideDown('slow');
                            $('.contact-form img.loader').fadeOut('slow', function() {
                                $(this).remove()
                            });
                            $('#submit').removeAttr('disabled');


                            document.getElementById('alert').innerHTML = error
                                .responseJSON.message;
                            $('#alert').slideDown('slow');
                            $('.contact-form img.loader').fadeOut('slow', function() {
                                $(this).remove()
                            });
                            $('#submit').removeAttr('disabled');
                        }
                    });


                });
                return false;
            });
        });
    </script>
@endpush
