<?php include('views\layouts\header.php'); ?>


  <!-- Section - Alumni Start -->
  <section id="alumni" class="bg-white">
    <div class="container">
      <div class="row no-padding-rl">
        <div class="col-md-10 col-md-offset-1">
          <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
            Alumni of JMI
          </h2>
          <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl separator-line-extra-thick-long"></span>

          <br>
          <div class="text-gray-dark-2">
            <p>TEDx is a platform for people to witness remarkable ideas, firsthand.
            We're excited to be a  licensee and are reaching out to our alumni who
            we believe are committed to the power of ideas to support our TEDx event.
            Individuals like you are our university's lasting legacy and strongest
            voice. As a successful role model, you represent what we aspire to
            become: professional, efficient and charitable, making a positive impact
            on the community. We, at JMI, are finding new ways to build an engagement
            and we feel, for you to join our event is one of the easiest ways to
            reconnect, give back to the University, and serve as a springboard for
            further involvement. We believe, whatever you did at JMI, wherever you
            are in your career, your support can make a big difference to the ongoing
            success of our event and JMI. For you, lending a helping hand to us
            will not only allow you to take part in and experience our event but
            also help transform today’s students into tomorrow’s leaders. These
            students are indeed the future leaders of the world and helping them
            achieve their goals can only benefit people like you in the near future.</p>

            <p>We are looking forward to discussing ways in which you could help underwrite
            and add to this incredible new experience. Your involvement will make
            this event a special and successful celebration.</p>

            <p>Please enter your particulars and we'll get in touch to find opportunities
            for your contribution in TEDxManaretAlfarouk.</p>
          </div>
        </div>
        <!-- //.col-md-10 -->
      </div>
      <!-- //.row -->

      <div class="row margin-5 no-margin-rl no-margin-bottom">
        <div class="col-md-10 col-md-offset-1">

          <form name="alumni" action="thank-you" method="post" netlify>
            <div class="row">
              <div class="col-sm-6">
                <input type="text" placeholder="Name" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
              </div>
              <!-- //.col-md-6 -->

              <div class="col-sm-6">
                <input type="text" placeholder="Contact number" name="phone" required>
                <input type="text" placeholder="Course and Batch" name="course-and-batch" required>
              </div>
              <!-- //.col-md-6 -->
            </div>
            <!-- //.row -->

            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <textarea placeholder="Your Message" name="message" required></textarea>
              </div>
              <!-- //.col-md-6 -->
            </div>
            <!-- //.row -->

            <div class="row text-center">
              <button type="submit" class="btn btn-base-color btn-medium">
                Submit
              </button>
            </div>
            <!-- //.row -->
          </form>
        </div>
        <!-- //.col-md-10 -->
      </div>
      <!-- //.row -->
    </div>
    <!-- //.container -->
  </section>
  <!-- //Section - Alumni End -->



  <?php include('views\layouts\footer.php');?>
