<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ url('index') }}">
                <img src="{{ asset('build/assets/images/brand/logo.png') }}" class="header-brand-img main-logo"
                    alt="Sparic logo">
                <img src="{{ asset('build/assets/images/brand/logo-light.png') }}" class="header-brand-img darklogo"
                    alt="Sparic logo">
                <img src="{{ asset('build/assets/images/brand/icon.png') }}" class="header-brand-img icon-logo"
                    alt="Sparic logo">
                <img src="{{ asset('build/assets/images/brand/icon2.png') }}" class="header-brand-img icon-logo2"
                    alt="Sparic logo">
            </a>
        </div>
        <!-- logo-->
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-home-4-line"></i><span class="side-menu__label">Dashboard</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Dashboard</a></li>
                                            <li><a class="slide-item" href="{{ url('index') }}">index</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon ri-menu-unfold-fill"></i>
                        <span class="side-menu__label">Submenu items</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side29">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Submenu items</a>
                                            </li>
                                            <li><a href="javascript:void(0)" class="slide-item">Submenu-1</a></li>
                                            <li class="sub-slide">
                                                <a class="sub-side-menu__item" data-bs-toggle="sub-slide"
                                                    href="javascript:void(0)"><span
                                                        class="sub-side-menu__label">Submenu-2</span><i
                                                        class="sub-angle fe fe-chevron-right"></i></a>
                                                <ul class="sub-slide-menu">
                                                    <li><a class="sub-slide-item"
                                                            href="javascript:void(0)">Submenu-2.1</a></li>
                                                    <li><a class="sub-slide-item"
                                                            href="javascript:void(0)">Submenu-2.2</a></li>
                                                    <li class="sub-slide2">
                                                        <a class="sub-side-menu__item2" href="javascript:void(0)"
                                                            data-bs-toggle="sub-slide2"><span
                                                                class="sub-side-menu__label2">Submenu-2.3</span><i
                                                                class="sub-angle2 fe fe-chevron-right"></i></a>
                                                        <ul class="sub-slide-menu2">
                                                            <li><a href="javascript:void(0)"
                                                                    class="sub-slide-item2">Submenu-2.3.1</a></li>
                                                            <li><a href="javascript:void(0)"
                                                                    class="sub-slide-item2">Submenu-2.3.2</a></li>
                                                            <li><a href="javascript:void(0)"
                                                                    class="sub-slide-item2">Submenu-2.3.3</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>


                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-shield-user-line"></i><span
                            class="side-menu__label">Administration</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Dashboard</a>
                                            </li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.permission.index') }}">Permission</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.roles.index') }}">Roles</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.user.index') }}">Users</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                 <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-settings-line"></i><span
                            class="side-menu__label">Setting</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Site Setting</a>
                                            </li>
                                            <li><a class="slide-item"
                                                    href="">Seo</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.home-content.index') }}">Home Content</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.banner.index') }}">Banner</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.about-us-content.index') }}">About Us</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.offer.index') }}">Offer Section</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.work-process.index') }}">Work Prosess Section</a></li>
                                            <li><a class="slide-item"
                                                    href="{{ route('admin.plan.index') }}">Plan</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
