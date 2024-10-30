<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="{{ url('') }}">
        <img src="{{ asset('admin/images/screen.png') }}" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="{{ url('') }}">
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
            <img class="img-xs rounded-circle" src="{{ asset('admin/images/user_png.png') }}" alt="Profile image"> </a>
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
 {{-- <!-- Navbar Header -->
 <nav
 class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
>
 <div class="container-fluid">
   <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
   </nav>
   <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
     <li class="nav-item topbar-user dropdown hidden-caret">
       <a
         class="dropdown-toggle profile-pic"
         data-bs-toggle="dropdown"
         href="#"
         aria-expanded="false"
       >
         <div class="avatar-sm">
           <img
             src="{{ asset('assets/img/user_png.png') }}"
             alt="..."
             class="avatar-img rounded-circle"
           />
         </div>
         <span class="profile-username">
           <span class="fw-bold">{{ Auth::user()->name }}</span>
         </span>
       </a>
       <ul class="dropdown-menu dropdown-user animated fadeIn">
         <div class="dropdown-user-scroll scrollbar-outer">
           <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
           </li>
         </div>
       </ul>
     </li>
   </ul>
 </div>
</nav>
<!-- End Navbar --> --}}