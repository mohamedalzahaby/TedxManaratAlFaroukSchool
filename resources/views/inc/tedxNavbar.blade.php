  <!-- Navigation Start -->
  <nav id="navigation" class="<?php echo $_SERVER['REQUEST_URI'] == ('/about') ? "navbar navbar-fixed-top" : "navbar navbar-fixed-top navbar-dark"; ?>">
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
            <li><a href="/about" class="line-height-unset headerTextcolor">About</a></li>
            <?php if ( !Auth::guest() ) : ?>
            <li><a href="/product" class="line-height-unset headerTextcolor">Product</a></li>
            <?php endif ?>
            <li><a href="/contact" class="line-height-unset headerTextcolor">contact</a></li>
            <li><a href="/Board" class="line-height-unset headerTextcolor">ourTeam</a></li>
            <li><a href="/sendMail" class="line-height-unset headerTextcolor">sendMail</a></li>
            <li><a href="/events" class="line-height-unset headerTextcolor">events</a></li>
            <li class="bg-base-color">
              <a href="/register" class="line-height-unset headerTextcolor width-100">
                Register
              </a>
            </li>
            <?php if ( !Auth::guest() ) : ?>
              <li class="nav-item">
                <a href="signOut" class="line-height-unset headerTextcolor">Sign Out</a>
              </li>
              <?php else : ?>
                <li class="nav-item">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Login</a>
                    <ul class="dropdown-menu form-wrapper">
                    <li>
                        <form action="signIn" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="email" required="required" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Login" name='login'>
                        <div class="form-footer">
                            <a href="#">Forgot Your password?</a>
                        </div>
                        </form>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="signUp" class="line-height-unset headerTextcolor">Sign Up</a>
                </li>
            <?php endif ?>
            <?php if ( !Auth::guest() ) : ?>
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

                                  <?php if (isset($_SESSION['notifications']) && $_SESSION['NewnotificationsCtr'] != 0 ) { ?>
                                    <span class="count" id="dd-notifications-count"><?php echo $_SESSION['NewnotificationsCtr'];?></span>
                                  <?php } ?>
                                </div>
                                <div class="dropdown-body">
                                  <?php if (isset($_SESSION['notifications'])) { $notification = $_SESSION['notifications']; ?>
                                      <div class="notification new">
                                        <div class="notification-image-wrapper">
                                        </div>
                                        <div class="notification-text">
                                          <span class="highlight"><?php echo $notification;?></span>
                                        </div>
                                      </div>
                                    <?php } ?>
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
              <?php endif ?>
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
