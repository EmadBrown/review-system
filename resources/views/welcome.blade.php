<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
  <title>Forum - Free Bulma template</title>
  
      <!-- Bulma Version 0.6.0 -->
   <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />
    
 
</head>
<body >
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
  </div>
</nav>
 
  <section class="container">
    <div class="columns">
      <div class="column is-3">
        <a class="button is-primary is-block is-alt is-large" href="#">Add Review</a>
      </div>

      <div class="column is-9">
        <div class="box content">
          <article class="post">
            <h4>Bulma: How do you center a button in a box?</h4>
            <span class="pull-right has-text-grey-light"><i class="fa fa-comments"></i> 1</span>
            <div class="media">
              <div class="media-left">
                <p class="image is-32x32">
                  <img src="http://bulma.io/images/placeholders/128x128.png">
                </p>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <a href="#">@jsmith</a> replied 34 minutes ago  &nbsp; 
                    <span class="tag">Question</span>
                  </p>
                </div>
              </div>
            </div>
          </article>
           

        </div>
      </div>

    </div>
       @include('add')
  </section>
   
  <footer class="footer">
    <div class="container">
      <div class="content has-text-centered">
        <p>
          <strong>Bulma Templates</strong> by <a href="https://github.com/dansup">Daniel Supernault</a>. The source code is licensed
          <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
        </p>
        <p>
          <a class="icon" href="https://github.com/dansup/bulma-templates">
            <i class="fa fa-github"></i>
          </a>
        </p>
      </div>
    </div>
  </footer>
    <script type="text/javascript" src="{{ asset ('js/app.js') }}"></script>
    
</body>
</html>