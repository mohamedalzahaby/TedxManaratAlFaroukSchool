@extends('layouts.app')
@section('content')

  <!-- Section - Contact Start -->
  <section id="contact" class="bg-white-2">
    <div class="container">
      <div class="row no-padding-rl">
        <div class="col-md-12">
          <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
            Contact Us
          </h2>
          <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl separator-line-extra-thick-long"></span>
        </div>
        <!-- //.col-md-10 -->
      </div>
      <!-- //.row -->

      <div class="row margin-4 no-margin-rl no-margin-bottom">
        <div class="col-md-5 no-padding-rl">
          <div class="row text-center">
            <i class="fa fa-envelope-o display-block text-base-color title-extra-large-2"></i>
            <br>
            <h4 class="font-weight-300 letter-spacing-1">
              TEDxManaretAlfarouk@gmail.com
            </h4>
          </div>
          <!-- //.row -->

          <p class="margin-8 no-margin-bottom no-margin-rl font-family-alt text-extra-large">
            Send us your queries by email.<br>
            We endeavour to answer them all within 24 hours.
          </p>

          <br>
          <form name="contact" action="thank-you" method="post" id="form-contact" netlify>
            <div class="row margin-4 no-margin-rl">
              <input type="text" placeholder="Your Name" name="name" class="required" required>
              <input type="email" placeholder="Your Email" name="email" class="required email" required>
              <textarea placeholder="Your Message" name="message" class="required" required></textarea>
            </div>
            <!-- //.row -->

            <div class="row margin-4 no-margin-rl">
              <span class="display-block font-family-alt letter-spacing-1 text-gray-dark-2 text-small text-uppercase">
                * Please enter all fields correctly
              </span>
            </div>
            <!-- //.row -->

            <div class="row margin-4 no-margin-rl">
              <button id="btn-form-contact" type="submit" class="btn btn-base-color btn-medium">
                Send Message
              </button>
            </div>
            <!-- //.row -->
          </form>
        </div>
        <!-- //.col-md-5 -->

        <div class="contact-address col-md-6 col-md-offset-1">
          <div class="row text-center">
            <i class="fa fa-map-marker display-block text-base-color title-extra-large-2"></i>
            <!-- <span class="display-block font-family-alt font-weight-700 letter-spacing-1 margin-5 no-margin-bottom no-margin-rl text-large text-uppercase">
              Our Location
            </span> -->
            <br>
            <h4 class="font-weight-300 letter-spacing-1">
              Manarat Alfarouk Islamic School
            </h4>
          </div>
          <!-- //.row -->
          <div class="row text-center">
            <div class="margin-8 no-margin-bottom no-margin-rl map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.248386076548!2d31.41383351497699!3d30.058413924867693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458473a2f638611%3A0x470a665556112987!2sManaret+Al+Farouk+Islamic+Language+School!5e0!3m2!1sen!2seg!4v1555595230804!5m2!1sen!2seg" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.2906312479427!2d77.28254455362033!3d28.56103426474026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfb09de6f2e8596e7!2sJamia+Millia+Islamia!5e0!3m2!1sen!2sin!4v1497486772213"
                frameborder="0"
                allowfullscreen>
              </iframe> -->
            </div>
            <!-- //.map -->
          </div>
          <!-- //.row -->
        </div>
        <!-- //.col-md-6 -->
      </div>
      <!-- //.row -->
    </div>
    <!-- //.container -->
  </section>
  <!-- //Section - Contact End -->



  @endsection
