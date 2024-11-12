<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="">
        <img src="{{ asset('admin/images/screen.png') }}" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="">
        <img src="{{ asset('admin/images/screen.png') }}" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="{{ asset('admin/images/user_png.png') }}" alt="Profile image"><span class="fw-bold mx-1">{{ Auth::user()->name }}</span></a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-xs rounded-circle mb-1" src="{{ asset('admin/images/user_png.png') }}" alt="Profile image"> </a>
            <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
          </div>
          <div class="mx-3">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a style="color: blue" type="submit" onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Чиқиш') }}
              </a>
          </form>
          </div>
      
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
