 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
          <img
            src="{{ asset('assets/img/kaiadmin/screen.png') }}"
            alt="navbar brand"
            class="navbar-brand h-75 w-50 mx-4"
          />
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          @if( Auth::user()->name == 'Abdixojayev')
          <li class="nav-item active">
            <a
              {{-- data-bs-toggle="collapse" --}}
              href="{{ url('index') }}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-home"></i>
              <p>Aсосий Саҳифа</p>
            </a>
          </li>
          @endif
          @if( Auth::user()->name == 'Qarabayeva')
          <li class="nav-item active">
            <a
              {{-- data-bs-toggle="collapse" --}}
              href="{{ url('business_trips') }}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fa fa-home"></i>
              <p>Asosiy Sahifa</p>
            </a>
          </li>
          @endif
           {{--
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#base">
              <i class="fas fa-layer-group"></i>
              <p>Base</p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts">
              <i class="fas fa-th-list"></i>
              <p>Sidebar Layouts</p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#forms">
              <i class="fas fa-pen-square"></i>
              <p>Forms</p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
              <i class="fas fa-table"></i>
              <p>Tables</p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#maps">
              <i class="fas fa-map-marker-alt"></i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#charts">
              <i class="far fa-chart-bar"></i>
              <p>Charts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="widgets.html">
              <i class="fas fa-desktop"></i>
              <p>Widgets</p>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->