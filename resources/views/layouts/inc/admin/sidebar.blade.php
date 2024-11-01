<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @if( Auth::user()->name == 'Abdixojayev')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('index') }}">
          <i class="menu-icon mdi mdi-home"></i>
          <span class="menu-title">Aсосий саҳифа</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Qutliyev')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('training_courses') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-school"></i>
          <span class="menu-title">Тренинг ўқув курси</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ url('higher_organs') }}" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-account-group"></i>
          <span class="menu-title">Таҳлилий материаллар</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ url('publishes') }}" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-newspaper"></i>
          <span class="menu-title">Илмий нашриёт ишлари</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ url('conventions') }}" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-calendar-check"></i>
          <span class="menu-title">Иштирок этган анжуманлар</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Qarabayeva')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('business_trips') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-airplane"></i>
          <span class="menu-title">Хизмат Сафарлари</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Maxmudov')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('young_economists') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-cash-multiple"></i>
          <span class="menu-title">Ёш Иқтисодчилар</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Turdiyev')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('oavpublish') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-shield-account"></i>
          <span class="menu-title">ОАВ нашриёт ишлари</span>
        </a>
      </li>
    @endif
  </ul>
</nav>
 {{-- <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
          {{-- <img
            src="{{ asset('assets/img/kaiadmin/screen.png') }}"
            alt="navbar brand"
            class="navbar-brand h-75 w-50 mx-4"
          /> --}}
          {{-- <a href="index.html" class="logo">
            <img
              src="{{ asset('assets/img/kaiadmin/screen.png') }}"
              alt="navbar brand"
              class="navbar-brand"
              height="30"
            />
          </a>
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
      </div> --}}
      <!-- End Logo Header -->
    {{-- </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">

          @if( Auth::user()->name == 'Abdixojayev')
          <li class="nav-item active">
            <a --}}
              {{-- data-bs-toggle="collapse" --}}
              {{-- href="{{ url('index') }}"
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
            <a --}}
              {{-- data-bs-toggle="collapse" --}}
              {{-- href="{{ url('business_trips') }}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fa fa-suitcase"></i>
              <p>Хизмат cафарлари</p>
            </a>
          </li>
          @endif

          @if( Auth::user()->name == 'Qutliyev')
          <li class="nav-item active">
            <a --}}
              {{-- data-bs-toggle="collapse" --}}
              {{-- href="{{ url('training_courses') }}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fa fa-graduation-cap"></i>
              <p>Тренинг ўқув курси</p>
            </a>
          </li>
          <li class="nav-item active">
            <a --}}
              {{-- data-bs-toggle="collapse" --}}
              {{-- href="{{ url('higher_organs') }}"
              class="collapsed"
              aria-expanded="false"
            >
            <i class="fas fa-chart-bar"></i>
              <p>Таҳлилий материаллар</p>
            </a>
          </li>
          <li class="nav-item active">
            <a --}}
              {{-- data-bs-toggle="collapse" --}}
              {{-- href="{{ url('publishes') }}"
              class="collapsed"
              aria-expanded="false"
            >
            <i class="fas fa-file-alt"></i>
              <p>Илмий нашриёт ишлари</p>
            </a>
          </li> --}}
          {{-- @endif --}}
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
        {{-- </ul>
      </div>
    </div>
  </div> --}}
  <!-- End Sidebar --> 