@php
use App\Http\Controllers\Controller;
$controller = new Controller();
    $css = '55px';
    if (strstr($_SERVER['REQUEST_URI'], "/posts/") != false) {
        if (strstr($_SERVER['REQUEST_URI'], "/posts/create") != true) {
            if ($_SERVER['REQUEST_URI'] == "/posts/$posts->id") {
                $css = '85px';
            }
        }
    }
    else {
        $css = '55px';
    }
@endphp

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
            <div id="navbar" class="navbar-collapse collapse col-lg-12 col-sm-12 col-md-12 pull-right" style="height:30px!important;">
                <ul class="nav navbar-nav font-family-alt letter-spacing-1 text-uppercase font-weight-700" style="position:relative;
              top:-70px">
                    <li><a href="/about" class="line-height-unset headerTextcolor"style="margin-top:70px;margin-right:20px" >About</a></li>
                    <li><a href="/posts" class="line-height-unset headerTextcolor"style="margin-top:70px;margin-right:20px" >Blog</a></li>
                    <li><a href="/contact" class="line-height-unset headerTextcolor"style="margin-top:70px;margin-right:20px" >contact</a></li>
                    <li><a href="/ourTeam" class="line-height-unset headerTextcolor"style="margin-top:70px;margin-right:20px" >ourTeam</a></li>
                    {{-- <li><a href="/sendMail" class="line-height-unset headerTextcolor"style="margin-right:20pxmargin-top:75px">sendMail</a></li> --}}
                    <li><a href="/events" class="line-height-unset headerTextcolor" style="margin-top:70px;margin-right:20px">events</a></li>
                    <li class="bg-base-color">
                        <a href="/registeration" class="line-height-unset headerTextcolor width-100"style="margin-top:70px;margin-right:20px;padding-left:15px">
                            Register
                        </a>
                    </li>
                    {{-- <li>
                        <div ng-app="demoApp" class="ng-app">
                            <div class="wrapper" ng-controller="demoController">
                                <div class="nav-bar">
                                    <ul>
                                        <li>
                                            <div class="dropdowns-wrapper">
                                                <div class="dropdown-container" style="position:relative;top:{{$css}}">
                                                    <div class="notifications dropdown dd-trigger" ng-click="showNotifications($event)">
                                                        <span class="count animated" id="notifications-count">awaitingNotifications</span>
                                                        <span class="fa fa-bell-o"></span>
                                                    </div>
                                                    <div class="dropdown-menu animated" id="notification-dropdown">
                                                        <div class="dropdown-header">
                                                            <span class="triangle"></span>
                                                            <span class="heading">Notifications</span>
                                                            <span class="count" id="dd-notifications-count">newNotifications.length</span>
                                                        </div>
                                                        <div class="dropdown-body">
                                                            <div class="notification new" ng-repeat="notification in newNotifications.slice().reverse() track by notification.timestamp">
                                                                <div class="notification-image-wrapper">
                                                                    <div class="notification-image">
                                                                        <img src="notification.user.imageUrl" alt="" width="32">
                                                                    </div>
                                                                </div>
                                                                <div class="notification-text">
                                                                    <span class="highlight">notification.user.name</span> notification.action notification.target
                                                                </div>
                                                            </div>
                                                            <div class="notification" ng-repeat="notification in readNotifications.slice().reverse() track by $index">
                                                                <div class="notification-image-wrapper">
                                                                    <div class="notification-image">
                                                                        <img src="notification.user.imageUrl" alt="" width="32">
                                                                    </div>
                                                                </div>
                                                                <div class="notification-text">
                                                                    <span class="highlight">notification.user.name</span> notification.action notification.target
                                                                </div>
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
                    </li> --}}

                    {{-- <li>
                        <a class="line-height-unset headerTextcolor" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"style=";margin-right:20px">{{ __('Logout') }} </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a   id="navbarDropdown" class="nav-link dropdown-toggle line-height-unset headerTextcolor  " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin-top:70px;margin-right:20px;">
                            {{ Auth::user()->fname }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="padding-left:10px">
                            <ul class="list-item">
                                @if (!$controller->autherization( 'Show All Registration Forms'))
                                    <li><a style="color:black; font-size:15px;" href="/registrationForm"><b>All Forms</b></a></li>
                                @endif
                                @if (!$controller->autherization( 'show UserType'))
                                    <li><a style="color:black; font-size:15px;" href="/usertype"><b>User Types</b></a></li>
                                @endif
                                @if (!$controller->autherization( 'Show All Users'))
                                    <li><a style="color:black; font-size:15px;" href="/user"><b>All Users</b></a></li>
                                @endif
                                <li>
                                    <a style="color:black; font-size:15px;" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <b>{{ __('Logout') }}</b>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf  </form>
                                </li>
                            </ul>
                        </div>


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
