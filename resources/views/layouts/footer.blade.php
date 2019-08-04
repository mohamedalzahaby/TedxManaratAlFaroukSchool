@php
    $lastEventData = DB::table('event')->latest()->first();
    $eventAddressString =  $lastEventData->address;
@endphp
<!-- Section - Event banner start -->
<section id="event-banner" class="bg-white pull-up">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 text-center">
          <i class="fa fa-clock-o display-block text-base-color title-extra-large-2"></i>
          <span class="display-block font-family-alt font-weight-700 letter-spacing-1 margin-5 no-margin-bottom no-margin-rl text-large text-uppercase">
            Date &amp; Time
          </span>
          <p class="margin-3 font-family-alt no-margin-bottom no-margin-rl title-small text-gray-dark-2">
            {{ $lastEventData->date }}<br>
            {{ $lastEventData->eventStart.' to '.$lastEventData->eventEnd  }}
          </p>
        </div>
        <!-- //.col-sm-4 -->
        <div class="col-sm-4 xs-margin-8 xs-no-margin-bottom xs-no-margin-rl text-center">
          <i class="fa fa-map-marker display-block text-base-color title-extra-large-2"></i>
          <span class="display-block font-family-alt font-weight-700 letter-spacing-1 margin-5 no-margin-bottom no-margin-rl text-large text-uppercase">
            Venue
          </span>
          <p class="margin-3 font-family-alt no-margin-bottom no-margin-rl title-small text-gray-dark-2">
                {{$eventAddressString}}
          </p>
        </div>
        <!-- //.col-sm-4 -->
      </div>
      <!-- //.row -->
    </div>
  </section>
  <!-- //Section - Event banner end -->



<!-- Footer Start -->
<footer class="footer bg-white">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="footer-logo xs-text-center">
            <img src="{{ asset('images/logos/TEDx.png') }}" alt="tedxLogo">
          </div>
          <!-- //.footer-logo -->
          <p class="disclaimer xs-text-center">
            This independent TEDx event is operated under license from TED.
          </p>
          <!-- //.disclaimer -->
        </div>
        <!-- //.col-sm-4 -->

        <div class="col-sm-8">
          <div class="footer-social text-right">
            <ul class="list-inline list-unstyled no-margin xs-text-center xs-title-small title-medium">
              <li><a href="https://www.facebook.com/TEDxManaratAlFarouk/"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.instagram.com/tedxmanaratalfaroukschool/?fbclid=IwAR1UN4gf8oagbH3JKQeLcV3InzKxdlFD7q-S9dgv2MkKI8vjhDSkHgggR5U"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
          <!-- //.footer-social -->
        </div>
        <!-- //.col-sm-8 -->
      </div>
      <!-- //.row -->
    </div>
    <!-- //.container -->
  </footer>
  <!-- //Footer End -->


  <!-- Scroll to top -->
  <a href="#page-top" class="page-scroll scroll-to-top"><i class="fa fa-angle-up"></i></a>


  <!-- jQuery -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <!-- Bootstrap -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <!-- Plugins -->
  <script src="{{ asset('js/pace.min.js') }}"></script>
  <script src="{{ asset('js/debouncer.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/jquery.inview.min.js') }}"></script>
  <script src="{{ asset('js/jquery.matchHeight.js') }}"></script>
  <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

  <!-- BG Parallax JS -->
  <script src="{{ asset('js/TweenMax.min.js') }}"></script>
  <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('js/animation.gsap.min.js') }}"></script>

  <!-- Theme -->
  <script src="{{ asset('js/main.js') }}"></script>

  <!-- Countdown -->
  <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('js/countdown.js') }}"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0-beta.1/angular.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0-beta.1/angular-animate.js'></script>
  <script src="{{ asset('js/notificationIndex.js') }}"></script>

