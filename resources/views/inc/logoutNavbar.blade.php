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
            <img class="logo-navbar-dark" src="{{ asset('storage/logos/tedxWhite.png') }}" alt="TEDx"/>

          </a>
        </div>
        <!-- //.navbar-header -->
        <div id="navbar" class="navbar-collapse collapse col-lg-9 col-sm-12 col-md-12 pull-right" style="height: 20px !important;">
            <ul class="nav navbar-nav font-family-alt letter-spacing-1 text-uppercase font-weight-700" style="position:relative;
              top:-70px">
              <li><a href="/about" class="line-height-unset headerTextcolor" style="margin-right:20px;margin-top:75px">About</a></li>
                {{-- @if (!Auth::guest())
                    <li><a href="/product" class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">Product</a></li>
                @endif --}}
                <li><a href="/posts" class="line-height-unset headerTextcolor"style="margin-right:20px;margin-top:75px">Blog</a></li>
                <li><a href="/contact" class="line-height-unset headerTextcolor"style="margin-right:20px;margin-top:75px">contact</a></li>
                <li><a href="/ourTeam"   class="line-height-unset headerTextcolor"style="margin-right:20px;margin-top:75px">ourTeam</a></li>
                <li><a href="/events" class="line-height-unset headerTextcolor"style="margin-right:20px;margin-top:75px">events</a></li>
                <li class="bg-base-color">
                    <a href="/registeration" class="line-height-unset headerTextcolor width-100"style="margin-top:75px">
                        Register
                    </a>
                </li>
                <li><a href="/login"   class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">signin</a></li>
                <li><a href="/signUp"   class="line-height-unset headerTextcolor"style="margin-top:75px;margin-right:20px">signup</a></li>
            </ul>
        </div>
        <!-- //.navbar-collapse -->
      </div>
      <!-- //.row -->
    </div>
    <!-- //.container -->
  </nav>
  <!-- //Navigation End -->
