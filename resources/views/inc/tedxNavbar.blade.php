  <!-- Navigation Start -->
  <nav id="navigation" class="{{$_SERVER['REQUEST_URI'] == ('/about') ? "navbar navbar-fixed-top" : "navbar navbar-fixed-top navbar-dark"}}">
    <div class="container">
      <div class="row">
        <div class="navbar-header col-lg-3">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand font-family-alt letter-spacing-1 text-extra-large text-uppercase" href="/about">
            <img class="logo-navbar-dark" src="{{ asset('images/logos/tedxWhite.png') }}" alt="TEDx" />

          </a>
        </div>
        <!-- //.navbar-header -->
        <div id="navbar" class="navbar-collapse collapse col-lg-9 col-sm-12 col-md-12 pull-right" style="height: 20px !important;">
            <ul class="nav navbar-nav font-family-alt letter-spacing-1 text-uppercase font-weight-700" style="position:relative;
              top:-70px">
              <li><a href="/about" class="line-height-unset headerTextcolor" style="margin-top:75px;margin-right:20px">About</a></li>
                {{-- @if (!Auth::guest())
                    <li><a href="/product" class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">Product</a></li>
                @endif --}}
                <li><a href="/posts" class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">Blog</a></li>
                <li><a href="/contact" class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">contact</a></li>
                <li><a href="/ourTeam"   class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">ourTeam</a></li>

                @if (!Auth::guest())
                    <li><a href="/sendMail" class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">sendMail</a></li>
                @endif
                <li><a href="/events" class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">events</a></li>
                <li class="bg-base-color">
                <a href="/registeration" class="line-height-unset headerTextcolor width-100"style="margin-top:75px">
                    Register
                </a>
                </li>
                @if (Auth::guest())
                    <li><a href="/login"   class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">signin</a></li>
                    <li><a href="/signUp"   class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">signup</a></li>
                @endif

                @if (!Auth::guest())
                    <li>
                        <div ng-app="demoApp" class="ng-app">
                            <div class="wrapper" ng-controller="demoController">
                                <div class="nav-bar">
                                    <ul>
                                        <li>
                                            <div class="dropdowns-wrapper">
                                                <div class="dropdown-container" style="top:-15px">
                                                    <div class="notifications dropdown dd-trigger" ng-click="showNotifications($event)">
                                                        <?php if (isset($_SESSION['notifications']) && $_SESSION['NewnotificationsCtr'] != 0 ){   ?>
                                                        <span class="count animated" id="notifications-count"><?php echo $_SESSION['NewnotificationsCtr'];?></span>
                                                        <?php } ?>
                                                    <span class="fa fa-bell-o"></span>
                                                    </div>
                                                    <div class="dropdown-menu animated" id="notification-dropdown">
                                                        <div class="dropdown-header">
                                                            <span class="triangle"></span>
                                                            <span class="heading">Notifications</span>
                                                            @if (isset($_SESSION['notifications']) && $_SESSION['NewnotificationsCtr'] != 0)
                                                                <span class="count" id="dd-notifications-count">{{ $_SESSION['NewnotificationsCtr'] }}</span>
                                                            @endif

                                                        </div>
                                                        <div class="dropdown-body">
                                                            @if (isset($_SESSION['notifications']))
                                                                @php $notification = $_SESSION['notifications']; @endphp
                                                                <div class="notification new">
                                                                    <div class="notification-image-wrapper">
                                                                    </div>
                                                                    <div class="notification-text">
                                                                        <span class="highlight">{{$notification}} </span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <!-- <div class="notification">
                                                            <div class="notification-image-wrapper">
                                                            </div>
                                                            <div class="notification-text">
                                                                <span class="highlight">abdalah</span> heloo
                                                            </div>

                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="line-height-unset headerTextcolor" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
          </li>
        </ul>
        </div>
        <!-- //.navbar-collapse -->
      </div>
      <!-- //.row -->
    </div>
    <!-- //.container -->
  </nav>
  <!-- //Navigation End -->
