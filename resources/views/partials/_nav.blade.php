<nav class="navbar is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ route('home') }}">
      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="{{ route('home') }}">
        Home
      </a>
    </div>
  </div>
</nav>