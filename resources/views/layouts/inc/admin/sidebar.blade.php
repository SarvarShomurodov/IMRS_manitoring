<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @if( Auth::user()->name == 'Abdixojayev')
      <li class="nav-item {{ Request::is('index*') || Request::is('higher_organs*') || Request::is('business_trips*') || Request::is('training_courses*') || Request::is('publishes*') || Request::is('oavpublish*') ||Request::is('conventions*') || Request::is('scientific*') || Request::is('seminar*') || Request::is('young_economists*') || Request::is('methods*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('index') }}">
          <i class="menu-icon mdi mdi-home"></i>
          <span class="menu-title">Aсосий саҳифа</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Qutliyev')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item {{ Request::is('training_courses*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('training_courses') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-school"></i>
          <span class="menu-title">Тренинг ўқув курси</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('higher_organs*') ? 'active' : '' }}">
        <a class="nav-link"  href="{{ url('higher_organs') }}" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-account-group"></i>
          <span class="menu-title">Таҳлилий материаллар</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('publishes*') ? 'active' : '' }}">
        <a class="nav-link"  href="{{ url('publishes') }}" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-newspaper"></i>
          <span class="menu-title">Илмий нашриёт ишлари</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('conventions*') ? 'active' : '' }}">
        <a class="nav-link"  href="{{ url('conventions') }}" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-calendar-check"></i>
          <span class="menu-title">Иштирок этган анжуманлар</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('scientific*') ? 'active' : '' }}">
        <a class="nav-link"  href="{{ url('scientific') }}" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-certificate"></i>
          <span class="menu-title">Илмий даража олиш</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('seminar*') ? 'active' : '' }}">
        <a class="nav-link"  href="{{ url('seminar') }}" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-domain"></i>
          <span class="menu-title">Иштирок этган анжуманлар</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Qarabayeva')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item {{ Request::is('business_trips*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('business_trips') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-airplane"></i>
          <span class="menu-title">Хизмат Сафарлари</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Maxmudov')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item {{ Request::is('young_economists*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('young_economists') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-cash-multiple"></i>
          <span class="menu-title">Ёш Иқтисодчилар</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Turdiyev')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item {{ Request::is('oavpublish*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('oavpublish') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-shield-account"></i>
          <span class="menu-title">ОАВ нашриёт ишлари</span>
        </a>
      </li>
    @endif
    @if( Auth::user()->name == 'Axmedova')
    <li class="nav-item nav-category">Barcha malumotlar</li>
      <li class="nav-item {{ Request::is('methods*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('methods') }}" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-lightbulb-on"></i>
          <span class="menu-title">Илмий методологик семинар</span>
        </a>
      </li>
    @endif
  </ul>
</nav>