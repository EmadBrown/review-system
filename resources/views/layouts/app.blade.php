<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
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
      <a class="navbar-item" href="https://bulma.io/">
        Home
      </a>
     
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
             <div class="navbar-item has-dropdown is-hoverable">
                       @if (Auth::guest())
                            <a class="navbar-link" href="{{route('admin.login')}}">
                              Login
                            </a>
                        @else
                          <a class="navbar-link" href="#">
                        {{ Auth::user()->name }}    
                          </a>
                        <div class="navbar-dropdown is-boxed">
                          <a href="{{route('admin.logout')}}" class="navbar-item">
                                    <span class="icon">
                                      <i class="fa fa-fw fa-sign-out m-r-5"></i>
                                    </span>
                                    Logout
                            </a>
                        </div>
                         @endif
                </div>
          </p> 
        </div>
      </div>
    </div>
  </div>
</nav>
        
      
    
 
        @include('layouts.partials._messages')
        
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
