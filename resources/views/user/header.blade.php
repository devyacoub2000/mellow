<header id="header">
    <nav class="header-top bg-secondary py-1">
      <div class="container-fluid padding-side">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
          <ul class="info d-flex flex-wrap list-unstyled m-0">
            <li class="location text-capitalize d-flex align-items-center me-4" style="font-size: 14px;">
              <svg class="color me-1" width="15" height="15">
                <use xlink:href="#location"></use>
              </svg>{{getSettings('location')}}
            </li>
            <li class="phone d-flex align-items-center me-4" style="font-size: 14px;">
              <svg class="color me-1" width="15" height="15">
                <use xlink:href="#phone"></use>
              </svg>{{getSettings('phone')}}
            </li>
            <li class="time d-flex align-items-center me-4" style="font-size: 14px;">
              <svg class="color me-1" width="15" height="15">
                <use xlink:href="#email"></use>
              </svg>{{getSettings('email')}}
            </li>
          </ul>
          <ul class="social-links d-flex flex-wrap list-unstyled m-0 ">
            <li class="social">
              <a href="{{getSettings('facebook')}}">
                <svg class="social" width="16" height="16">
                  <use xlink:href="#facebook"></use>
                </svg>
              </a>
            </li>
            <li class="social ms-4">
              <a href="#">
                <svg class="social" width="16" height="16">
                  <use xlink:href="#twitter"></use>
                </svg>
              </a>
            </li>
            <li class="social ms-4">
              <a href="#">
                <svg class="social" width="16" height="16">
                  <use xlink:href="#linkedin"></use>
                </svg>
              </a>
            </li>
            <li class="social ms-4">
              <a href="#">
                <svg class="social" width="16" height="16">
                  <use xlink:href="#instagram"></use>
                </svg>
              </a>
            </li>
            <li class="social ms-4">
              <a href="#">
                <svg class="social" width="16" height="16">
                  <use xlink:href="#youtube"></use>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <nav id="primary-header" class="navbar navbar-expand-lg py-4">
      <div class="container-fluid padding-side">
        <div class="d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('front/images/main-logo.png')}}" class="logo img-fluid">
          </a>
          <button class="navbar-toggler border-0 d-flex d-lg-none order-3 p-2 shadow-none" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false">
            <svg class="navbar-icon" width="60" height="60">
              <use xlink:href="#navbar-icon"></use>
            </svg>
          </button>
          <div class="header-bottom offcanvas offcanvas-end " id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
            <div class="offcanvas-header px-4 pb-0">
              <button type="button" class="btn-close btn-close-black mt-2" data-bs-dismiss="offcanvas"
                aria-label="Close" data-bs-target="#bdNavbar"></button>
            </div>
            <div class="offcanvas-body align-items-center justify-content-center">
              <div class="search d-block d-lg-none m-5">
                <form class=" position-relative">
                  <input type="text" class="form-control bg-secondary border-0 rounded-5 px-4 py-2"
                    placeholder="Search...">
                  <a href="#" class="position-absolute top-50 end-0 translate-middle-y p-1 me-3">
                    <svg class="" width="20" height="20">
                      <use xlink:href="#search"></use>
                    </svg>
                  </a>
                </form>
              </div>
              <ul class="navbar-nav align-items-center mb-2 mb-lg-0">
                <li class="nav-item px-3">
                  <a class="nav-link active p-0" aria-current="page" href="{{Auth::check() && Auth::user()->type == 'admin' ? route('admin.index') : route('front.index')}}">Home</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link p-0" href="#about-us">About</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link p-0" href="#services">Services</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link p-0" href="#blog">Blog</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link p-0" href="#footer">Contact</a>
                </li>
               
              </ul>
            </div>
          </div>
<div class="search d-lg-block d-none d-flex gap-3">
    @guest
        <a href="{{ route('login') }}" class="btn btn-primary d-flex align-items-center gap-2 px-3 py-2 shadow-sm rounded-3" style="transition: 0.3s;">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
    @endguest

    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger d-flex align-items-center gap-2 px-3 py-2 shadow-sm rounded-3" style="transition: 0.3s;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    @endauth
</div>


        </div>
      </div>
    </nav>
  </header>