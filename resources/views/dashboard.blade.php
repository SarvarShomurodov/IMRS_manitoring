<div class="mx-3">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a style="color: blue" type="submit" onclick="event.preventDefault(); this.closest('form').submit();">
        {{ __('Чиқиш') }}
      </a>
  </form>
  </div>
