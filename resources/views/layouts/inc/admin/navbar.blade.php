 <!-- Navbar Header -->
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
<!-- End Navbar -->