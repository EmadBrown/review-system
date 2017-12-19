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
                              </div>
                            </div>
                          </div>
                        </div>
                </nav>