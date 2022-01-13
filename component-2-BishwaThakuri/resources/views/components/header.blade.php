<div class="bg">
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <img src="images/logo.png" style="width: 120px;">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          @if(!auth()->check())
          <a href="login" class="link">Login</a>
          @endif
          @if(auth()->check())
          {{ Auth::user()->name }}
          @endif
        </div>
      </nav>
    </div>

    <br>