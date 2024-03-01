<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
  <div class="container-fluid navbar-inner">
    <a href="{{route('dashboard')}}" class="navbar-brand">
      <svg width="30" class="text-primary" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
      </svg>
      <h4 class="logo-title">{{env('APP_INISIAL')}}</h4>
    </a>
    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
      <i class="icon">
        <svg width="20px" height="20px" viewBox="0 0 24 24">
          <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
      </svg>
      </i>
    </div>
    <div class="input-group search-input">
      <span class="input-group-text" id="search-input">
        <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
          <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </span>
      <input type="search" class="form-control" placeholder="Search...">
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      <span class="navbar-toggler-icon">
        <span class="navbar-toggler-bar bar1 mt-2"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto  navbar-list mb-2 mb-lg-0">
      <li class="nav-item me-3">
        <a class="btn btn-primary d-flex align-items-center" aria-current="page" href="https://hopeui.iqonic.design/pro/laravel" target="_blank" style="top: 4px;">
        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path d="M21.6389 14.3957H17.5906C16.1042 14.3948 14.8993 13.1909 14.8984 11.7045C14.8984 10.218 16.1042 9.01409 17.5906 9.01318H21.6389" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                <path d="M18.049 11.6429H17.7373" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.74766 3H16.3911C19.2892 3 21.6388 5.34951 21.6388 8.24766V15.4247C21.6388 18.3229 19.2892 20.6724 16.3911 20.6724H7.74766C4.84951 20.6724 2.5 18.3229 2.5 15.4247V8.24766C2.5 5.34951 4.84951 3 7.74766 3Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                <path d="M7.03516 7.5382H12.4341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                            </svg>  &ensp;                       
            Muzakki
        </a>
        </li>
      <li class="nav-item me-3">
        <a class="btn btn-secondary d-flex align-items-center" aria-current="page" href="https://hopeui.iqonic.design/pro/laravel" target="_blank" style="top: 4px;">
        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor"></path>                            </svg>  &ensp;                       
            Mustahiq
        </a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a href="#" class="search-toggle nav-link" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{asset('images/Flag/flag001.png')}}" class="img-fluid rounded-circle" alt="user" style="height: 30px; min-width: 30px; width: 30px;">
            <span class="bg-primary"></span>
          </a>
          <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="dropdownMenuButton2">
            <div class="card shadow-none m-0 border-0">
              <div class=" p-0 ">
                <ul class="list-group list-group-flush">
                  <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="{{asset('images/Flag/flag-03.png')}}" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>Spanish</a></li>
                  <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="{{asset('images/Flag/flag-04.png')}}" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>Italian</a></li>
                  <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="{{asset('images/Flag/flag-02.png')}}" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>French</a></li>
                  <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="{{asset('images/Flag/flag-05.png')}}" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>German</a></li>
                  <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="{{asset('images/Flag/flag-06.png')}}" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>Japanese</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a href="#"  class="nav-link" id="notification-drop" data-bs-toggle="dropdown" >
            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="currentColor"></path>
              <path opacity="0.4" d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z" fill="currentColor"></path>
            </svg>
            <span class="bg-danger dots"></span>
          </a>
          <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="notification-drop">
            <div class="card shadow-none m-0">
              <div class="card-header d-flex justify-content-between bg-primary py-3">
                <div class="header-title">
                  <h5 class="mb-0 text-white">All Notifications</h5>
                </div>
              </div>
              <div class="card-body p-0">
                <a href="#" class="iq-sub-card">
                  <div class="d-flex align-items-center">
                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/01.png')}}" alt="">
                    <div class="ms-3 w-100">
                      <h6 class="mb-0 ">Emma Watson Bni</h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">95 MB</p>
                        <small class="float-right font-size-12">Just Now</small>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="iq-sub-card">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/02.png')}}" alt="">
                    </div>
                    <div class="ms-3 w-100">
                      <h6 class="mb-0 ">New customer is join</h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">Cyst Bni</p>
                        <small class="float-right font-size-12">5 days ago</small>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="iq-sub-card">
                  <div class="d-flex align-items-center">
                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/03.png')}}" alt="">
                    <div class="ms-3 w-100">
                      <h6 class="mb-0 ">Two customer is left</h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">Cyst Bni</p>
                        <small class="float-right font-size-12">2 days ago</small>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="iq-sub-card">
                  <div class="d-flex align-items-center">
                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/04.png')}}" alt="">
                    <div class="w-100 ms-3">
                      <h6 class="mb-0 ">New Mail from Fenny</h6>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">Cyst Bni</p>
                        <small class="float-right font-size-12">3 days ago</small>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a href="#" class="nav-link" id="mail-drop" data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
            <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.4" d="M22 15.94C22 18.73 19.76 20.99 16.97 21H16.96H7.05C4.27 21 2 18.75 2 15.96V15.95C2 15.95 2.006 11.524 2.014 9.298C2.015 8.88 2.495 8.646 2.822 8.906C5.198 10.791 9.447 14.228 9.5 14.273C10.21 14.842 11.11 15.163 12.03 15.163C12.95 15.163 13.85 14.842 14.56 14.262C14.613 14.227 18.767 10.893 21.179 8.977C21.507 8.716 21.989 8.95 21.99 9.367C22 11.576 22 15.94 22 15.94Z" fill="currentColor"></path>
              <path d="M21.4759 5.67351C20.6099 4.04151 18.9059 2.99951 17.0299 2.99951H7.04988C5.17388 2.99951 3.46988 4.04151 2.60388 5.67351C2.40988 6.03851 2.50188 6.49351 2.82488 6.75151L10.2499 12.6905C10.7699 13.1105 11.3999 13.3195 12.0299 13.3195C12.0339 13.3195 12.0369 13.3195 12.0399 13.3195C12.0429 13.3195 12.0469 13.3195 12.0499 13.3195C12.6799 13.3195 13.3099 13.1105 13.8299 12.6905L21.2549 6.75151C21.5779 6.49351 21.6699 6.03851 21.4759 5.67351Z" fill="currentColor"></path>
            </svg>
            <span class="bg-primary count-mail"></span>
          </a>
          <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="mail-drop">
            <div class="card shadow-none m-0">
              <div class="card-header d-flex justify-content-between bg-primary py-3">
                <div class="header-title">
                  <h5 class="mb-0 text-white">All Message</h5>
                </div>
              </div>
              <div class="card-body p-0 ">
                <a href="#" class="iq-sub-card">
                  <div class="d-flex  align-items-center">
                    <div class="">
                      <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/01.png')}}" alt="">
                    </div>
                    <div class=" w-100 ms-3">
                      <h6 class="mb-0 ">Bni Emma Watson</h6>
                      <small class="float-left font-size-12">13 Jun</small>
                    </div>
                  </div>
                </a>
                <a href="#" class="iq-sub-card">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/02.png')}}" alt="">
                    </div>
                    <div class="ms-3">
                      <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                      <small class="float-left font-size-12">20 Apr</small>
                    </div>
                  </div>
                </a>
                <a href="#" class="iq-sub-card">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/03.png')}}" alt="">
                    </div>
                    <div class="ms-3">
                      <h6 class="mb-0 ">Why do we use it?</h6>
                      <small class="float-left font-size-12">30 Jun</small>
                    </div>
                  </div>
                </a>
                <a href="#" class="iq-sub-card">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/04.png')}}" alt="">
                    </div>
                    <div class="ms-3">
                      <h6 class="mb-0 ">Variations Passages</h6>
                      <small class="float-left font-size-12">12 Sep</small>
                    </div>
                  </div>
                </a>
                <a href="#" class="iq-sub-card">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="{{asset('images/shapes/05.png')}}" alt="">
                    </div>
                    <div class="ms-3">
                      <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                      <small class="float-left font-size-12">5 Dec</small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{asset('images/avatars/01.png')}}" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
          <img src="{{asset('images/avatars/avtar_1.png')}}" alt="User-Profile" class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
          <img src="{{asset('images/avatars/avtar_2.png')}}" alt="User-Profile" class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
          <img src="{{asset('images/avatars/avtar_4.png')}}" alt="User-Profile" class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
          <img src="{{asset('images/avatars/avtar_5.png')}}" alt="User-Profile" class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
          <img src="{{asset('images/avatars/avtar_3.png')}}" alt="User-Profile" class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
            <div class="caption ms-3 d-none d-md-block ">
              <h6 class="mb-0 caption-title">{{ auth()->user()->full_name ?? 'Austin Robertson'  }}</h6>
              <p class="mb-0 caption-sub-title text-capitalize">{{ str_replace('_',' ',auth()->user()->user_type) ?? 'Marketing Administrator' }}</p>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('users.show', auth()->id() || 1)}}">Profile</a></li>
            <li><a class="dropdown-item" href="{{route('auth.userprivacysetting')}}">Privacy Setting</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form method="POST" action="{{route('logout')}}">
              @csrf
              <a href="javascript:void(0)" class="dropdown-item"
                onclick="event.preventDefault();
              this.closest('form').submit();">
                  {{ __('Log out') }}
              </a>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


