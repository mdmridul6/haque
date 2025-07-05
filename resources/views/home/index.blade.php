@extends('home.layouts.app')

@section('content')
    <!-- Start Banner
                                        ============================================= -->
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

    <!-- Start Companies Area
                                        ============================================= -->
    <div class="companies-area default-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 info">
                    <h3>{!! $content->about_us_title !!}</h3>
                    <p>
                        {{ $content->about_us_subtitle }}
                    </p>
                </div>
                <div class="col-md-6 clients">
                    <div class="clients-items owl-carousel owl-theme text-center">

                        @foreach ($clients as $client)
                            <div class="single-item">
                                <a href="#"><img src="{{ asset($client->images) }}" alt="Clients"></a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Companies Area -->



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

    {{-- Handle last row with 1 or 2 items --}}
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


    {{-- <!-- Start We Offer
                    ============================================= -->
    <div id="features" class="we-offer-area item-border-less bg-gray default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>What we <span>Offer</span></h2>
                        <h4>Understanding the easy to use process</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="our-offer-items less-carousel">
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <span class="number">1</span>
                            <i class="flaticon-sketch"></i>
                            <h4>Project creation</h4>
                            <p>
                                Downs those still witty an balls so chief so. Moment an little remain no lively
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <span class="number">2</span>
                            <i class="bi bi-house-door"></i>
                            <h4>Software Development</h4>
                            <p>
                                Downs those still witty an balls so chief so. Moment an little remain no lively
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <span class="number">3</span>
                            <i class="flaticon-collaboration"></i>
                            <h4>Porject Management</h4>
                            <p>
                                Downs those still witty an balls so chief so. Moment an little remain no lively
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <span class="number">4</span>
                            <i class="flaticon-speedometer"></i>
                            <h4>Project Implement</h4>
                            <p>
                                Downs those still witty an balls so chief so. Moment an little remain no lively
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <span class="number">5</span>
                            <i class="flaticon-refresh"></i>
                            <h4>Software Update</h4>
                            <p>
                                Downs those still witty an balls so chief so. Moment an little remain no lively
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <span class="number">6</span>
                            <i class="flaticon-customer-service"></i>
                            <h4>24/7 Support</h4>
                            <p>
                                Downs those still witty an balls so chief so. Moment an little remain no lively
                            </p>
                        </div>
                    </div>
                    <!-- End Single Item -->

                </div>
            </div>
        </div>
    </div>
    <!-- End We Offer --> --}}

    <!-- Start Overview
                                        ============================================= -->


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
                                    <li class="active">

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
                                    <div id="{{ Str::slug($workProcess?->button_title) }}" class="tab-pane fade active in">
                                        <div class="col-md-6 thumb">
                                            <img src="{{ asset($workProcess?->image) }}" alt="Thumb">
                                        </div>
                                        <div class="col-md-6 info">
                                            <h3>{{ $workProcess?->process_title }}
                                            </h3>
                                            <p>
                                                {{ $workProcess?->process_description }}
                                            </p>

                                            <ul>
                                                <li>
                                                    <h4> {{ $workProcess?->type_1_title }}</h4>
                                                     {{ $workProcess?->type_1_sub_title }}
                                                </li>
                                                <li>
                                                    <h4> {{ $workProcess?->type_2_title }}</h4>
                                                    {{ $workProcess?->type_2_sub_title }}
                                                </li>
                                                <li>
                                                    <h4> {{ $workProcess?->type_3_title }}</h4>
                                                     {{ $workProcess?->type_3_sub_title }}
                                                </li>
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

    <!-- Start Fun Factor
                                        ============================================= -->
    <div class="fun-factor-area shadow dark bg-fixed text-light default-padding"
        style="background-image: url({{ asset('frontend/assets/img/2440x1578.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-8 fun-fact-items">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 item">
                            <div class="fun-fact">
                                <div class="timer" data-to="230" data-speed="5000"></div>
                                <span class="medium">Satisfied customers</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 item">
                            <div class="fun-fact">
                                <div class="timer" data-to="89" data-speed="5000"></div>
                                <span class="medium">Professional agents</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 item">
                            <div class="fun-fact">
                                <div class="timer" data-to="50" data-speed="5000"></div>
                                <span class="medium">Hours support</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 subscribe">
                    <h3>Stay update with us</h3>
                    <p>
                        Dried quick round it or order. Add past see west felt did any. Say out noise you taste merry plate
                        you share. My resolve arrived is we chamber be removal.
                    </p>
                    <form action="#">
                        <div class="input-group stylish-input-group">
                            <input type="email" placeholder="Enter your e-mail here" class="form-control" name="email">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Factor -->

    <!-- Start Pricing Area
                                        ============================================= -->
    <div id="pricing" class="pricing-area bg-gray default-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Pricing <span>Plan</span></h2>
                        <h4>List of our pricing packages</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pricing pricing-simple text-center">
                    <div class="col-md-4">
                        <div class="pricing-item">
                            <ul>
                                <li class="icon">
                                    <i class="flaticon-start"></i>
                                </li>
                                <li class="pricing-header">
                                    <h4>Trial Version</h4>
                                    <h2>Free</h2>
                                </li>
                                <li>Demo file <span data-toggle="tooltip" data-placement="top"
                                        title="Available on pro version"><i class="fas fa-info-circle"></i></span></li>
                                <li>Update</li>
                                <li>File compressed</li>
                                <li>Commercial use</li>
                                <li>Support <span data-toggle="tooltip" data-placement="top"
                                        title="Available on pro version"><i class="fas fa-info-circle"></i></span></li>
                                <li>2 database</li>
                                <li>Documetation <span data-toggle="tooltip" data-placement="top"
                                        title="Available on pro version"><i class="fas fa-info-circle"></i></span></li>
                                <li class="footer">
                                    <a class="btn btn-dark border btn-sm" href="#">Try for free</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pricing-item active">
                            <ul>
                                <li class="icon">
                                    <i class="flaticon-quality-badge"></i>
                                </li>
                                <li class="pricing-header">
                                    <h4>Regular</h4>
                                    <h2><sup>$</sup>29 <sub>/ Year</sub></h2>
                                </li>
                                <li>Demo file</li>
                                <li>Update <span data-toggle="tooltip" data-placement="top"
                                        title="Only for extended licence"><i class="fas fa-info-circle"></i></span></li>
                                <li>File compressed</li>
                                <li>Commercial use</li>
                                <li>Support <span data-toggle="tooltip" data-placement="top"
                                        title="Only for extended licence"><i class="fas fa-info-circle"></i></span></li>
                                <li>5 database</li>
                                <li>Documetation</li>
                                <li class="footer">
                                    <a class="btn btn-theme effect btn-sm" href="#">Get Started</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pricing-item">
                            <ul>
                                <li class="icon">
                                    <i class="flaticon-value"></i>
                                </li>
                                <li class="pricing-header">
                                    <h4>Extended</h4>
                                    <h2><sup>$</sup>59 <sub>/ Year</sub></h2>
                                </li>
                                <li>Demo file</li>
                                <li>Update</li>
                                <li>File compressed</li>
                                <li>Commercial use</li>
                                <li>Support</li>
                                <li>8 database</li>
                                <li>Documetation</li>
                                <li class="footer">
                                    <a class="btn btn-dark border btn-sm" href="#">Get Started</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->

    <!-- Start Team
                                        ============================================= -->
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
                <div class="team-items d-flex justify-content-evenly">
                    <div class="col-md-6 col-lg-3 col-xl-3 single-item">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/800x800.png') }}" alt="Thumb">
                                <div class="overlay">
                                    <h4>I love my Studio</h4>
                                    <p>
                                        Jointure goodness interest debating did outweigh. Is time from them full my gone in
                                        went Of no introduced
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="instagram">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-envelope-open"></i></a>
                                </span>
                                <h4>Ahmed Kamal</h4>
                                <span>Chairman of Softing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3 single-item">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/800x800.png') }}" alt="Thumb">
                                <div class="overlay">
                                    <h4>Connecting People</h4>
                                    <p>
                                        Jointure goodness interest debating did outweigh. Is time from them full my gone in
                                        went Of no introduced
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="instagram">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-envelope-open"></i></a>
                                </span>
                                <h4>Drunal Park</h4>
                                <span>Manager of Softing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3 single-item">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/800x800.png') }}" alt="Thumb">
                                <div class="overlay">
                                    <h4>Network Builder</h4>
                                    <p>
                                        Jointure goodness interest debating did outweigh. Is time from them full my gone in
                                        went Of no introduced
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="instagram">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-envelope-open"></i></a>
                                </span>
                                <h4>Munia Ankor</h4>
                                <span>Founder of Softing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3 single-item">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('frontend/assets/img/800x800.png') }}" alt="Thumb">
                                <div class="overlay">
                                    <h4>Network Builder</h4>
                                    <p>
                                        Jointure goodness interest debating did outweigh. Is time from them full my gone in
                                        went Of no introduced
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="instagram">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-envelope-open"></i></a>
                                </span>
                                <h4>Munia Ankor</h4>
                                <span>Founder of Softing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team -->

    <!-- Start Testimonials
                                        ============================================= -->
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
                            <!-- Single Item -->
                            <div class="testimonial-item">
                                <div class="thumb col-md-4">
                                    <img src="{{ asset('frontend/assets/img/800x800.png') }}" alt="Thumb">
                                </div>
                                <div class="info col-md-8">
                                    <div class="content">
                                        <p>
                                            Understood instrument or do connection no appearance do invitation. Dried quick
                                            round it or order. Add past see west felt did any. plate you share. My resolve
                                            arrived is we chamber be removal.
                                        </p>
                                        <h4>Bubhan Kritha</h4>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="testimonial-item">
                                <div class="thumb col-md-4">
                                    <img src="{{ asset('frontend/assets/img/800x800.png') }}" alt="Thumb">
                                </div>
                                <div class="info col-md-8">
                                    <div class="content">
                                        <p>
                                            Understood instrument or do connection no appearance do invitation. Dried quick
                                            round it or order. Add past see west felt did any. plate you share. My resolve
                                            arrived is we chamber be removal.
                                        </p>
                                        <h4>Junl Sarukh</h4>
                                        <span>Software Engineer</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="testimonial-item">
                                <div class="thumb col-md-4">
                                    <img src="{{ asset('frontend/assets/img/800x800.png') }}" alt="Thumb">
                                </div>
                                <div class="info col-md-8">
                                    <div class="content">
                                        <p>
                                            Understood instrument or do connection no appearance do invitation. Dried quick
                                            round it or order. Add past see west felt did any. plate you share. My resolve
                                            arrived is we chamber be removal.
                                        </p>
                                        <h4>Makhon Daino</h4>
                                        <span>Compnay Owner</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Start Faq
                                        ============================================= -->
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
                <div class="col-md-6 video-faq">
                    <div class="video">
                        <img src="{{ asset('frontend/assets/img/800x800.png') }}" alt="Thumb">
                        <a class="popup-youtube light video-play-button"
                            href="https://www.youtube.com/watch?v=owhuBrGIOsE">
                            <i class="fa fa-play"></i>
                        </a>
                        <h4>Answer with video</h4>
                    </div>
                </div>
                <!-- End Video Faq -->

                <!-- Star Accordion Items -->
                <div class="col-md-6 faq-items">
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                            <span>1</span> Do I need a business plan?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            She wholly fat who window extent either formal. Removing welcomed civility or
                                            hastened is. Justice elderly but perhaps expense six her are another passage.
                                            Full her ten open fond walk not down.For request general express unknown are.
                                        </p>
                                        <p>
                                            He in just mr door body held john down he. So journey greatly or garrets. Draw
                                            door kept do so come on open mean. Estimating stimulated how reasonably
                                            precaution diminution she simplicity sir but.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                            <span>2</span> How long should a business plan be?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            She wholly fat who window extent either formal. Removing welcomed civility or
                                            hastened is. Justice elderly but perhaps expense six her are another passage.
                                            Full her ten open fond walk not down.For request general express unknown are.
                                        </p>
                                        <p>
                                            He in just mr door body held john down he. So journey greatly or garrets. Draw
                                            door kept do so come on open mean. Estimating stimulated how reasonably
                                            precaution diminution she simplicity sir but.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                            <span>3</span> What goes into a business plan?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            She wholly fat who window extent either formal. Removing welcomed civility or
                                            hastened is. Justice elderly but perhaps expense six her are another passage.
                                            Full her ten open fond walk not down.For request general express unknown are.
                                        </p>
                                        <p>
                                            He in just mr door body held john down he. So journey greatly or garrets. Draw
                                            door kept do so come on open mean. Estimating stimulated how reasonably
                                            precaution diminution she simplicity sir but.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac4">
                                            <span>4</span> Where do I start?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            She wholly fat who window extent either formal. Removing welcomed civility or
                                            hastened is. Justice elderly but perhaps expense six her are another passage.
                                            Full her ten open fond walk not down.For request general express unknown are.
                                        </p>
                                        <p>
                                            He in just mr door body held john down he. So journey greatly or garrets. Draw
                                            door kept do so come on open mean. Estimating stimulated how reasonably
                                            precaution diminution she simplicity sir but.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->

                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq  -->

    <!-- Start Blog
                                        ============================================= -->
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
                        <!--  Single Item -->
                        <div class="item">
                            <div class="thumb">
                                <a href="single.html">
                                    <img src="{{ asset('frontend/assets/img/800x600.png') }}" alt="Thumb">
                                </a>
                                <div class="tags">
                                    <a href="#">startup</a>
                                    <a href="#">business</a>
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">Become latter but nor abroad wisdom waited</a>
                                </h4>
                                <div class="meta">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-user"></i> User</a></li>
                                        <li><i class="fas fa-calendar-alt "></i> 12 Nov, 2019</li>
                                        <li><a href="#"><i class="fas fa-comments"></i> 23</a></li>
                                    </ul>
                                </div>
                                <p>
                                    Friendship sufficient assistance can prosperous met. As game he show it park do. Was has
                                    unknown few certain
                                </p>
                                <div class="read-more">
                                    <a href="#" class="more-btn">Read More <i
                                            class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--  End Single Item -->
                        <!--  Single Item -->
                        <div class="item">
                            <div class="thumb">
                                <a href="single.html">
                                    <img src="{{ asset('frontend/assets/img/800x600.png') }}" alt="Thumb">
                                </a>
                                <div class="tags">
                                    <a href="#">asset</a>
                                    <a href="#">earning</a>
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">attended desirous raptures declared assistance</a>
                                </h4>
                                <div class="meta">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-user"></i> User</a></li>
                                        <li><i class="fas fa-calendar-alt "></i> 12 Nov, 2019</li>
                                        <li><a href="#"><i class="fas fa-comments"></i> 23</a></li>
                                    </ul>
                                </div>
                                <p>
                                    Friendship sufficient assistance can prosperous met. As game he show it park do. Was has
                                    unknown few certain
                                </p>
                                <div class="read-more">
                                    <a href="#" class="more-btn">Read More <i
                                            class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--  End Single Item -->
                        <!--  Single Item -->
                        <div class="item">
                            <div class="thumb">
                                <a href="single.html">
                                    <img src="{{ asset('frontend/assets/img/800x600.png') }}" alt="Thumb">
                                </a>
                                <div class="tags">
                                    <a href="#">success</a>
                                    <a href="#">product</a>
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">Justice improve age article between projection </a>
                                </h4>
                                <div class="meta">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-user"></i> User</a></li>
                                        <li><i class="fas fa-calendar-alt "></i> 12 Nov, 2019</li>
                                        <li><a href="#"><i class="fas fa-comments"></i> 23</a></li>
                                    </ul>
                                </div>
                                <p>
                                    Friendship sufficient assistance can prosperous met. As game he show it park do. Was has
                                    unknown few certain
                                </p>
                                <div class="read-more">
                                    <a href="#" class="more-btn">Read More <i
                                            class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--  End Single Item -->
                        <!--  Single Item -->
                        <div class="item">
                            <div class="thumb">
                                <a href="single.html">
                                    <img src="{{ asset('frontend/assets/img/800x600.png') }}" alt="Thumb">
                                </a>
                                <div class="tags">
                                    <a href="#">startup</a>
                                    <a href="#">business</a>
                                </div>
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="#">Prosperous continuing entreat unreserved</a>
                                </h4>
                                <div class="meta">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-user"></i> User</a></li>
                                        <li><i class="fas fa-calendar-alt "></i> 12 Nov, 2019</li>
                                        <li><a href="#"><i class="fas fa-comments"></i> 23</a></li>
                                    </ul>
                                </div>
                                <p>
                                    Friendship sufficient assistance can prosperous met. As game he show it park do. Was has
                                    unknown few certain
                                </p>
                                <div class="read-more">
                                    <a href="#" class="more-btn">Read More <i
                                            class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--  End Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Contact Area
                                        ============================================= -->
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
                <div class="col-md-8 contact-form">
                    <h2>Let's lalk about your idea</h2>
                    <form action="assets/mail/contact.php" method="POST" class="contact-form">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name"
                                        type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email*"
                                        type="email">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                        type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group comments">
                                    <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                </div>
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
                            <div id="message" class="alert-msg"></div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 address">
                    <div class="address-items">
                        <ul class="info">
                            <li>
                                <h4>Office Location</h4>
                                <div class="icon"><i class="fas fa-map-marked-alt"></i></div>
                                <span>22 Baker Street,<br> London, United Kingdom,<br> W1U 3BW</span>
                            </li>
                            <li>
                                <h4>Phone</h4>
                                <div class="icon"><i class="fas fa-phone"></i></div>
                                <span>+44-20-7328-4499 <br>+99-34-8878-9989</span>
                            </li>
                            <li>
                                <h4>Email</h4>
                                <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                <span>info@yourdomain.com<br>admin@yourdomain.com</span>
                            </li>
                        </ul>
                        <h4>Social Address</h4>
                        <ul class="social">
                            <li class="facebook">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="twitter">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="pinterest">
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                            <li class="instagram">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    <!-- Start Google Maps
                                        ============================================= -->
    <div class="maps-area">
        <div class="container-full">
            <div class="row">
                <div class="google-maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google Maps -->
@endsection
