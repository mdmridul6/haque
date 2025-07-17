    <!-- Header
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">

            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand smooth-menu"
                        href="{{ !request()->routeIs('home') ? route('home') : '#home' }}">

                        @if ($content?->title_or_logo === 'logo')
                            <img src="{{ asset($content?->site_logo) }}" class="logo logo-display" alt="Logo">
                        @else
                            <h1>{{ $content?->site_title }}</h1>
                        @endif
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            <a class="smooth-menu" title="Home"
                                href="{{ !request()->routeIs('home') ? route('home') : '#home' }}">Home</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{ !request()->routeIs('home') ? route('home').'#about' : '#about' }}">About</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{ !request()->routeIs('home') ? route('home').'#features' : '#features' }}">Features</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{ !request()->routeIs('home') ? route('home').'#overview' : '#overview' }}">Overview</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{ !request()->routeIs('home') ? route('home').'#pricing' : '#pricing' }}">Pricing</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#team">Team</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#contact">contact</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
