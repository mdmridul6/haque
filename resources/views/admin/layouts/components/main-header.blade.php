<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal" href="{{ url('index') }}">
                <img src="{{ asset('build/assets/images/brand/logo.png') }}" class="header-brand-img main-logo"
                    alt="Sparic logo">
                <img src="{{ asset('build/assets/images/brand/logo-light.png') }}" class="header-brand-img darklogo"
                    alt="Sparic logo">
            </a>
            <!-- LOGO -->

            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2 justify-content-center">


                            <div class="dropdown d-flex">
                                <a href="{{ route('home') }}" target="_blank" class="nav-link icon" id="goto-home">
                                    <i class="ri-global-line"></i>
                                </a>
                            </div>
                            <!-- VISITE SITE -->


                            <div class="d-flex country">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                    <span class="dark-layout mt-1"><i class="ri-moon-clear-line"></i></span>
                                    <span class="light-layout mt-1"><i class="ri-sun-line"></i></span>
                                </a>
                            </div>
                            <!-- Theme-Layout -->

                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link" id="fullscreen-button">
                                    <i class="ri-fullscreen-exit-line fullscreen-button"></i>
                                </a>
                            </div>
                            <!-- Theme-Layout -->



                            {{-- <div class="dropdown d-flex notifications nav-link-notify">
                                <a class="nav-link icon" data-bs-toggle="dropdown"><i
                                        class="ri-notification-line"></i><span class=" pulse"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
                                    <div class="drop-heading border-bottom">
                                        <h6 class="mt-1 mb-0 fs-14 text-dark fw-semibold">Notifications
                                        </h6>
                                    </div>
                                    <div class="notifications-menu header-dropdown-scroll">
                                        <a class="dropdown-item border-bottom d-flex" href="javascript:void(0)">
                                            <div>
                                                <span
                                                    class="avatar avatar-md fs-20 brround fw-semibold text-center bg-primary-transparent"><i
                                                        class="fe fe-message-square text-primary"></i></span>
                                            </div>
                                            <div class="wd-80p ms-3 my-auto">
                                                <h5 class="text-dark mb-0 fw-semibold">Gladys Dare <span
                                                        class="text-muted">commented on</span>
                                                    Ecosystems</h5>
                                                <span class="notification-subtext">2m ago</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item border-bottom d-flex" href="javascript:void(0)">
                                            <div>
                                                <span
                                                    class="avatar avatar-md fs-20 brround fw-semibold text-danger bg-danger-transparent"><i
                                                        class="fe fe-user"></i></span>
                                            </div>
                                            <div class="wd-80p ms-3 my-auto">
                                                <h5 class="text-dark mb-0 fw-semibold">Jackson Wisky
                                                    <span class="text-muted"> followed
                                                        you</span>
                                                </h5>
                                                <span class="notification-subtext">15 min ago</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item border-bottom d-flex" href="javascript:void(0)">
                                            <span
                                                class="avatar avatar-md fs-20 brround fw-semibold text-center bg-success-transparent"><i
                                                    class="fe fe-check text-success"></i></span>
                                            <div class="wd-80p ms-3 my-auto">
                                                <h5 class="text-muted fw-semibold mb-0">You swapped exactly
                                                    <span class="text-dark fw-bold">2.054 BTC</span> for
                                                    <Span class="text-dark fw-bold">14,124.00</Span>
                                                </h5>
                                                <span class="notification-subtext">1 day ago</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item border-bottom d-flex" href="javascript:void(0)">
                                            <div>
                                                <span
                                                    class="avatar avatar-md fs-20 brround fw-semibold text-center bg-warning-transparent"><i
                                                        class="fe fe-dollar-sign text-warning"></i></span>
                                            </div>
                                            <div class="wd-80p ms-3 my-auto">
                                                <h5 class="text-dark mb-0 fw-semibold">Laurel <span
                                                        class="text-muted">donated</span> <span
                                                        class="text-success fw-semibold">$100</span> <span
                                                        class="text-muted">for</span> carbon removal</h5>
                                                <span class="notification-subtext">15 min ago</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex" href="javascript:void(0)">
                                            <div>
                                                <span
                                                    class="avatar avatar-md fs-20 brround fw-semibold text-center bg-info-transparent"><i
                                                        class="fe fe-thumbs-up text-info"></i></span>
                                            </div>
                                            <div class="wd-80p ms-3 my-auto">
                                                <h5 class="text-dark mb-0 fw-semibold">Sunny Grahm <span
                                                        class="text-muted">voted for</span> carbon capture
                                                </h5>
                                                <span class="notification-subtext">2 hors ago</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-center dropdown-footer">
                                        <a class="btn btn-primary btn-sm btn-block text-center"
                                            href="javascript:void(0)">VIEW ALL NOTIFICATIONS</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- NOTIFICATIONS -->


                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                    class="nav-link leading-none d-flex">
                                    <img src="{{ asset(auth()->user()->image) }}" alt="profile-user"
                                        class="avatar  profile-user brround cover-image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" data-bs-popper="none">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0 fw-semibold">{{ auth()->user()->full_name }}</h5>
                                            <span
                                                class="text-muted fs-12">{{ auth()?->user()?->getRoleNames()->join(',') }}</span>
                                        </div>
                                    </div>
                                    <a class="dropdown-item text-dark fw-semibold border-top"
                                        href="{{ route('admin.profile.edit') }}">
                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item text-dark fw-semibold" href="javascript:void(0)">
                                        <i class="dropdown-icon fe fe-mail"></i> Inbox
                                        <span class="badge bg-success float-end">3</span>
                                    </a>
                                    <a class="dropdown-item text-dark fw-semibold" href="javascript:void(0)">
                                        <i class="dropdown-icon fe fe-settings"></i> Settings
                                    </a>
                                    <a class="dropdown-item text-dark fw-semibold" href="javascript:void(0)">
                                        <i class="dropdown-icon fe fe-alert-triangle"></i>
                                        Support ?
                                    </a>
                                    <a class="dropdown-item text-dark fw-semibold"
                                        onclick="document.getElementById('logout-form').submit();"
                                        href="javascript:void(0)">
                                        <i class="dropdown-icon fe fe-log-out"></i> Sign
                                        out
                                    </a>


                                    <form action="{{ route('admin.logout') }}" id="logout-form" method="post">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
