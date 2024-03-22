<nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu">
    <div class="container-fluid navbar-inner">
        <div class="d-flex align-items-center justify-content-between w-100 landing-header">

            <a href="{{ route('uisheet') }}" class="navbar-brand m-0 d-xl-flex d-none">
                <!--Logo start-->
                <img src="{{ asset(env('APP_LOGO')) }}" alt="story-img" class="rounded-pill avatar-40">
 
                 <!--logo End-->
                <h5 class="logo-title  text-secondary">{{ env('APP_NAME') }} {{ env('APP_SUBNAME') }}</h5>
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
                    <img src="{{ asset(env('APP_LOGO')) }}" alt="story-img" class="rounded-pill avatar-40">

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

                        <!-- <li class="nav-item" style="padding-right: 10px;">
                            <a class="btn btn-secondary text-white"
                                href="{{route('mustahik.create')}}">
                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor"></path>                            </svg>  &ensp;                       
                                Mustahiq</a>
                        </li> -->
                        <li class="nav-item" style="padding-right: 10px;">
                            <a class="btn btn-secondary text-white" 
                                href="{{route('mustahikuser.create')}}">
                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor"></path>                            </svg>  &ensp;                       
                                Mustahiq</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary text-white"
                                href="{{ route('login') }}">
                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.08 22H7.91C4.38 22 2 19.729 2 16.34V7.67C2 4.28 4.38 2 7.91 2H16.08C19.62 2 22 4.28 22 7.67V16.34C22 19.729 19.62 22 16.08 22ZM14.27 11.25H7.92C7.5 11.25 7.17 11.59 7.17 12C7.17 12.42 7.5 12.75 7.92 12.75H14.27L11.79 15.22C11.65 15.36 11.57 15.56 11.57 15.75C11.57 15.939 11.65 16.13 11.79 16.28C12.08 16.57 12.56 16.57 12.85 16.28L16.62 12.53C16.9 12.25 16.9 11.75 16.62 11.47L12.85 7.72C12.56 7.43 12.08 7.43 11.79 7.72C11.5 8.02 11.5 8.49 11.79 8.79L14.27 11.25Z" fill="currentColor"></path></svg>
                                Login</a>
                        </li>
                    </ul>
                </div>
                <!-- container-fluid.// -->
            </nav>
            <!-- Sidebar Menu End -->
        </div>
    </div>
</nav>
