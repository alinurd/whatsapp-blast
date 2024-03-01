<nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu">
    <div class="container-fluid navbar-inner">
        <div class="d-flex align-items-center justify-content-between w-100 landing-header">

            <a href="{{ route('uisheet') }}" class="navbar-brand m-0 d-xl-flex d-none">
                <!--Logo start-->
                <img src="{{asset('images/icons/logo-tes.png')}}" alt="story-img" class="rounded-pill avatar-40">
 
                 <!--logo End-->
                <h5 class="logo-title  text-secondary">Badan Amil Zakat DKM Al-hasanah</h5>
            </a>
            <div class="d-flex align-items-center d-xl-none">
                <button class="d-xl-none btn btn-primary rounded-pill p-1 pt-0" data-bs-toggle="offcanvas"
                    data-bs-target="#navbar_main" aria-expanded="false" aria-controls="navbar_main">
                    <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                    </svg>
                </button>

                <a href="{{ route('uisheet') }}" class="navbar-brand ms-3  d-xl-none">
                    <!--Logo start-->
                    <img src="{{asset('images/icons/logo-tes.png')}}" alt="story-img" class="rounded-pill avatar-40">

                    <!--logo End-->
                    <h5 class="logo-title  text-secondary">Badan Amil Zakat DKM Al-hasanah</h5>
                </a>
            </div>
          
            <!-- Horizontal Menu Start -->
            <nav id="navbar_main" class="nav navbar navbar-expand-xl hover-nav horizontal-nav mobile-offcanvas ">
                <div class="container-fluid p-lg-0">
                    <!-- <div class="offcanvas-header px-0">
                        <div class="navbar-brand ms-3">
                            <svg class="icon-30 text-primary" width="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                    transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
                                <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                    transform="rotate(-45 7.72803 27.728)" fill="currentColor"></rect>
                                <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                    transform="rotate(45 10.5366 16.3945)" fill="currentColor"></rect>
                                <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                    transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
                            </svg>
                            <h5 class="logo-title">{{ env('APP_NAME') }}</h5>
                        </div>
                        <button class="btn-close float-end px-3"></button>
                    </div> -->
                    <ul class="navbar-nav iq-nav-menu  list-unstyled" id="header-menu">
                        <!-- <li class="nav-item ">
                            <a class="nav-link menu-arrow justify-content-start" data-bs-toggle="collapse"
                                href="#homeData" role="button" aria-expanded="false" aria-controls="homeData">
                                <span class="item-name">Home</span>
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-18"
                                    width="18" height="18" viewBox="0 0 24 24">
                                    <path d="M19 8.5L12 15.5L5 8.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                            <ul class="iq-header-sub-menu list-unstyled collapse" id="homeData">
                                <li class="nav-item">
                                    <a class="nav-link {{ activeRoute(route('uisheet')) }}"
                                        href="{{ route('uisheet') }}">
                                        App Landing Page
                                    </a>
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ activeRoute(route('landing-pages.software')) }}"
                                        href="{{ route('landing-pages.software') }}">Software Landing Page</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link {{ activeRoute(route('landing-pages.about')) }}"
                                href="{{ route('landing-pages.about') }}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link {{ activeRoute(route('landing-pages.feature')) }}"
                                href="{{ route('landing-pages.feature') }}">Features</a></li>
                        <li class="nav-item"><a class="nav-link {{ activeRoute(route('landing-pages.pricing')) }}"
                                href="{{ route('landing-pages.pricing') }}">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link {{ activeRoute(route('landing-pages.blog')) }}"
                                href="{{ route('landing-pages.blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link {{ activeRoute(route('landing-pages.faq')) }}"
                                href="{{ route('landing-pages.faq') }}">Faq</a></li> -->
                        <li class="nav-item ">
                            <a class="  btn btn-primary text-white"
                                href="{{ route('login') }}">
                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.08 22H7.91C4.38 22 2 19.729 2 16.34V7.67C2 4.28 4.38 2 7.91 2H16.08C19.62 2 22 4.28 22 7.67V16.34C22 19.729 19.62 22 16.08 22ZM14.27 11.25H7.92C7.5 11.25 7.17 11.59 7.17 12C7.17 12.42 7.5 12.75 7.92 12.75H14.27L11.79 15.22C11.65 15.36 11.57 15.56 11.57 15.75C11.57 15.939 11.65 16.13 11.79 16.28C12.08 16.57 12.56 16.57 12.85 16.28L16.62 12.53C16.9 12.25 16.9 11.75 16.62 11.47L12.85 7.72C12.56 7.43 12.08 7.43 11.79 7.72C11.5 8.02 11.5 8.49 11.79 8.79L14.27 11.25Z" fill="currentColor"></path></svg>
                                Login</a></li>
                    </ul>
                </div>
                <!-- container-fluid.// -->
            </nav>
            <!-- Sidebar Menu End -->
        </div>
    </div>
</nav>
