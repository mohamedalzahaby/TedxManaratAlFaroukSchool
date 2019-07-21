<?php if (isset($_SESSION['IsSignedUpIn'])) :  ?>

  <!DOCTYPE html>
  <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
  <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
  <!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
  <!--[if gt IE 8]><!-->
  <html class="no-js" lang="en">
  <!--<![endif]-->

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title, icon, description and keywords -->
    <title>TEDxManaratAlfaroukSchool</title>
    <link rel="shortcut icon" href="res/images/favicon.ico">

    <!-- Browser themes -->
    <meta name="theme-color" content="#000">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="res/css/bootstrap.min.css">

    <!-- Font Icons -->
    <link rel="stylesheet" href="res/css/font-awesome.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="res/css/flickity.min.css">
    <link rel="stylesheet" href="res/css/magnific-popup.css">

    <!-- Main styles -->
    <link rel="stylesheet" href="res/css/main.css">
    <link rel="stylesheet" href="res/css/style.css">

    <!-- Color skin -->
    <link rel="stylesheet" href="res/css/color_red.css">
    <link rel="stylesheet" href="res\css\dropdownForm.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css' />

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

    <?php if (isset($_SESSION['IsSignedUpIn'])) :   ?>
      <link rel="stylesheet" href="res\css\notificationStyle.css">
    <?php else : ?>
      <link rel="stylesheet" href="res\css\notification2.css">
    <?php endif ?>


    <script type="text/javascript">
      // Prevent dropdown menu from closing when click inside the form
      $(document).on("click", ".navbar-right .dropdown-menu", function(e) {
        e.stopPropagation();
      });
    </script>
    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 8]>
          <script src="res/js/modernizr.min.js"></script>
          <![endif]-->
  </head>




  <body id="page-top">
    <!-- Navigation Start -->
    <nav id="navigation" class="<?php echo $_SERVER['REQUEST_URI'] == ($GLOBALS['tedx'] . $GLOBALS['about']) ? "navbar navbar-fixed-top" : "navbar navbar-fixed-top navbar-dark"; ?>">
      <div class="container">
        <div class="row">
          <div class="navbar-header col-lg-3">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand font-family-alt letter-spacing-1 text-extra-large text-uppercase" href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['about']; ?>">
              <img class="logo-navbar-dark" src="res/images/logos/tedxWhite.png" alt="TEDx" />

            </a>
          </div>
          <!-- //.navbar-header -->
          <div id="navbar" class="navbar-collapse collapse col-lg-9 col-sm-12 col-md-12 pull-right" style="height: 20px !important;">
            <ul class="nav navbar-nav font-family-alt letter-spacing-1 text-uppercase font-weight-700" style="position:relative;
                top:-70px">
              <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['about']; ?>" class="line-height-unset headerTextcolor">About</a></li>
              <?php if ( isset($_SESSION['IsSignedUpIn']) && $_SESSION['userTypeId'] == 2) : ?>
              <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['product']; ?>" class="line-height-unset headerTextcolor">Product</a></li>
              <?php endif ?>
              <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['contact']; ?>" class="line-height-unset headerTextcolor">contact</a></li>
              <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['Board']; ?>" class="line-height-unset headerTextcolor">ourTeam</a></li>
              <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['sendMail']; ?>" class="line-height-unset headerTextcolor">sendMail</a></li>
              <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['events']; ?>" class="line-height-unset headerTextcolor">events</a></li>
              <li class="bg-base-color">
                <a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['register']; ?>" class="line-height-unset headerTextcolor width-100">
                  Register
                </a>
              </li>
              <?php if (isset($_SESSION['IsSignedUpIn'])) : ?>
                <li class="nav-item">
                  <a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['signOut']; ?>" class="line-height-unset headerTextcolor">Sign Out</a>
                </li>


              <?php else : ?>
                <li class="nav-item">
                  <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Login</a>
                  <ul class="dropdown-menu form-wrapper">
                    <li>
                      <form action="<?php echo $GLOBALS['ASSET'] . $GLOBALS['signIn']; ?>" method="post">
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
                  <a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['signUp']; ?>" class="line-height-unset headerTextcolor">Sign Up</a>
                </li>
              <?php endif ?>
              
                <li>
                  <div ng-app="demoApp" class="ng-app">
                    <div class="wrapper" ng-controller="demoController">
                      <div class="nav-bar">
                        <ul>
                        <li >
		        <div class="dropdowns-wrapper">
		          <div class="dropdown-container"style="top:-15px">
		            <div class="notifications dropdown dd-trigger" ng-click="showNotifications($event)">
		              <span class="count animated" id="notifications-count">{{awaitingNotifications}}</span>
		              <span class="fa fa-bell-o"></span>
		            </div>
		            <div class="dropdown-menu animated" id="notification-dropdown">
		              <div class="dropdown-header">
		                <span class="triangle"></span>
		                <span class="heading">Notifications</span>
		                <span class="count" id="dd-notifications-count">{{newNotifications.length}}</span>
		              </div>
		              <div class="dropdown-body">
		                <div class="notification new" ng-repeat="notification in newNotifications.slice().reverse() track by notification.timestamp">
		                  <div class="notification-image-wrapper">
		                  	<div class="notification-image">
			                  	<img src="{{notification.user.imageUrl}}" alt="" width="32">
			                  </div>
		                  </div>
		                  <div class="notification-text">
		                     <span class="highlight">{{notification.user.name}}</span> {{notification.action}} {{notification.target}}
		                  </div>
		                </div>
		                <div class="notification" ng-repeat="notification in readNotifications.slice().reverse() track by $index">
		                  <div class="notification-image-wrapper">
		                  	<div class="notification-image">
			                  	<img src="{{notification.user.imageUrl}}" alt="" width="32">
			                  </div>
		                  </div>
		                  <div class="notification-text">
		                     <span class="highlight">{{notification.user.name}}</span> {{notification.action}} {{notification.target}}
		                  </div>
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
  <?php else :  ?>
  
    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="en">
    <!--<![endif]-->

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- Title, icon, description and keywords -->
      <title>TEDxManaratAlfaroukSchool</title>
      <link rel="shortcut icon" href="res/images/favicon.ico">

      <!-- Browser themes -->
      <meta name="theme-color" content="#000">

      <!-- Bootstrap -->
      <link rel="stylesheet" href="res/css/bootstrap.min.css">

      <!-- Font Icons -->
      <link rel="stylesheet" href="res/css/font-awesome.min.css">

      <!-- Plugins -->
      <link rel="stylesheet" href="res/css/flickity.min.css">
      <link rel="stylesheet" href="res/css/magnific-popup.css">

      <!-- Main styles -->
      <link rel="stylesheet" href="res/css/main.css">
      <link rel="stylesheet" href="res/css/style.css">

      <!-- Color skin -->
      <link rel="stylesheet" href="res/css/color_red.css">
      <link rel="stylesheet" href="res\css\dropdownForm.css">
      <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css' />

      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="res\css\notificationStyle.css">

      <script type="text/javascript">
        // Prevent dropdown menu from closing when click inside the form
        $(document).on("click", ".navbar-right .dropdown-menu", function(e) {
          e.stopPropagation();
        });
      </script>

      <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 8]>
    <script src="res/js/modernizr.min.js"></script>
    <![endif]-->
    </head>





    <body id="page-top">
      <!-- Navigation Start -->
      <nav id="navigation" class="<?php echo $_SERVER['REQUEST_URI'] == ($GLOBALS['tedx'] . $GLOBALS['about']) ? "navbar navbar-fixed-top" : "navbar navbar-fixed-top navbar-dark"; ?>">
        <div class="container">
          <div class="row">
            <div class="navbar-header col-lg-3">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand font-family-alt letter-spacing-1 text-extra-large text-uppercase" href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['about']; ?>">
                <img class="logo-navbar-dark" src="res/images/logos/tedxWhite.png" alt="TEDx" />

              </a>
            </div>
            <!-- //.navbar-header -->
            <div id="navbar" class="navbar-collapse collapse col-lg-9 col-sm-12 col-md-12 pull-right">
              <ul class="nav navbar-nav font-family-alt letter-spacing-1 text-uppercase font-weight-700">
                <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['about']; ?>" class="line-height-unset headerTextcolor">About</a></li>
                <?php if ( isset($_SESSION['IsSignedUpIn']) && $_SESSION['userTypeId'] == 2) : ?>
              <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['product']; ?>" class="line-height-unset headerTextcolor">Product</a></li>
              <?php endif ?>
                <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['contact']; ?>" class="line-height-unset headerTextcolor">contact</a></li>
                <!-- <li><a href="<?php //echo $GLOBALS['ASSET'] . $GLOBALS['ourTeam']; ?>" class="line-height-unset headerTextcolor">Board</a></li> -->
                <!-- <li><a href="<?php// echo $GLOBALS['ASSET'] . $GLOBALS['Board']; ?>" class="line-height-unset headerTextcolor">ourTeam</a></li> -->
                <!-- <li><a href="<?php // echo $GLOBALS['ASSET'] . $GLOBALS['speakers']; ?>" class="line-height-unset headerTextcolor">speakers</a></li> -->
                <li><a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['events']; ?>" class="line-height-unset headerTextcolor">events</a></li>
                <li class="bg-base-color">
                  <a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['register']; ?>" class="line-height-unset headerTextcolor width-100">
                    Register
                  </a>
                </li>
                <?php if (isset($_SESSION['IsSignedUpIn'])) : ?>
                  <li class="nav-item">
                    <a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['signOut']; ?>" class="line-height-unset headerTextcolor">Sign Out</a>
                  </li>
                <?php else : ?>
                  <li class="nav-item">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">signin</a>
                    <ul class="dropdown-menu form-wrapper">
                      <li>
                        <form action="<?php echo $GLOBALS['ASSET'] . $GLOBALS['signIn']; ?>" method="post">
                          <!-- <p class="hint-text">Sign in by your social media account</p>
                          <div class="form-group social-btn clearfix">
                            <a href="#" class="btn btn-primary pull-left"><i class="fa fa-facebook"></i> Facebook</a>
                            <a href="#" class="btn btn-info pull-right"><i class="fa fa-twitter"></i> Twitter</a>
                          </div>
                          <div class="or-seperator"><b>or</b></div> -->
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="email" required="required" name="email">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
                          </div>
                          <input type="submit" class="btn btn-primary btn-block" value="signIn" name='login'>
                          <!-- <div class="form-footer">
                            <a href="#">Forgot Your password?</a>
                          </div> -->
                        </form>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo $GLOBALS['ASSET'] . $GLOBALS['signUp']; ?>" class="line-height-unset headerTextcolor">Sign Up</a>
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
    <?php endif ?>