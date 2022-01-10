<div class="bg">
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">Laravel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          @if(!auth()->check())
          <a href="login" class="link">Login</a>
          @endif
          @if(auth()->check())
          <div><p>{{ Auth::user()->name }}</p></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-dropdown-link>
          </form>
          @endif
        </div>
      </nav>
    </div>

    <br>