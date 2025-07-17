<!-- ===================== Start Footer ======================== -->
<footer class="default-padding-top bg-light">
    <div class="container">
        <div class="row">
            <div class="f-items">
                <div class="col-md-4 col-sm-6 equal-height item">
                    <div class="f-item about">

                        @if ($content?->title_or_logo === 'logo')
                            <img src="{{ asset($content?->site_logo) }}" alt="Logo">
                        @else
                            <p>{{ $content?->site_title }}</p>
                        @endif


                        <p>
                            {{ $content?->site_description }}
                        </p>

                        @if (isset($content->facebook_link) || isset($content->twitter_link) || isset($content->linkedin_link) || isset($content->instagram_link))

                            <h5>Follow Us</h5>
                            <ul>

                                @if (isset($content->facebook_link) && $content->facebook_link)
                                    <li>
                                        <a href="{{ $content->facebook_link }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                @endif
                                @if (isset($content->twitter_link) && $content->twitter_link)
                                    <li>
                                        <a href="{{ $content->twitter_link }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                @endif
                                @if (isset($content->linkedin_link) && $content->linkedin_link)
                                    <li>
                                        <a href="{{ $content->linkedin_link }}" target="_blank"><i
                                                class="fab fa-linkedin"></i></a>
                                    </li>
                                @endif
                                @if (isset($content->instagram_link) && $content->instagram_link)
                                    <li>
                                        <a href="{{ $content->instagram_link }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 equal-height item">
                    <div class="f-item link">
                        <h4>Company</h4>
                        <ul>
                            <li>
                                <a href="{{ !request()->routeIs('home') ? route('home').'#home' : '#home' }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ !request()->routeIs('home') ? route('home').'#about' : '#about' }}">About us</a>
                            </li>
                            <li>
                                <a href="{{ !request()->routeIs('home') ? route('home').'#features' : '#features' }}">Features</a>
                            </li>
                            <li>
                                <a href="{{ !request()->routeIs('home') ? route('home').'#overview' : '#overview' }}">Overview</a>
                            </li>
                            <li>
                                <a href="{{ !request()->routeIs('home') ? route('home').'#pricing' : '#pricing' }}">Pricing</a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">Blog Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 equal-height item">
                    <div class="f-item twitter-widget">
                        <h4>Contact Info</h4>
                        <p>
                            Possible offering at contempt mr distance stronger an. Attachment excellence announcing
                        </p>
                        <div class="address">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Website:</h5>
                                        <span>{{ request()->getHost() }}</span>
                                    </div>
                                </li>
                                @if (isset($content?->support_email) && $content?->support_email)
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Email:</h5>
                                        <span>{{ $content?->support_email }}</span>
                                    </div>
                                </li>
                                @endif


                                @if (isset($content?->support_phone) && $content?->support_phone)

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Phone:</h5>
                                        <span>{{ $content?->support_phone }}</span>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <p>&copy; Copyright 2019. All Rights Reserved by <a href="https://www.linkedin.com/in/md-mridul-biswas/" target="_blank">Md Mridul Biswash</a></p>
                    </div>
                    <div class="col-md-6 text-right link">
                        <ul>
                            <li>
                                <a href="{{ route('terms-and-conditions') }}">Terms</a>
                            </li>
                            <li>
                                <a href="{{ route('privacy-policy') }}">Privacy</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!-- End Footer -->
