<section id="registration" class="bg-white-2">
    <div class="container">
      <div class="row no-padding-rl">
        <div class="col-md-12">
          <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
            Applications
          </h2>
          <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl separator-line-extra-thick-long"></span>
        </div>
        <!-- //.col-md-12 -->
      </div>
      <!-- //.row -->



      <span class="bg-gray-light-2 separator-line-full"></span>
      <div class="row margin-5 no-margin-rl no-margin-bottom">
        <?php foreach ($data as $key => $form) { ?>
          <?php if ($key % 2) : ?>
            <div class="col-md-5 no-padding-rl">
              <div class="row text-center">
                <h3 class="font-family-alt font-weight-900 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
                  <?php echo $form['name']; ?>
                </h3>
              </div>
              <div class="margin-8 no-margin-bottom no-margin-rl text-center">
                <form action="ted/test" method="post">
                <input type="hidden" name="<?php echo $form['id'];?>">
                    <!-- <span  class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl">
                      Register
                      </span> -->
                      <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['userForm'].'?id='.$form['id'];?>">
                      <span  class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl">Register</span></a>
                </form>
              </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
          <?php else : ?>
            <!-- //.col-md-5 -->
            <div class="contact-address col-md-6 col-md-offset-1">
              <div class="row text-center">
                <h3 class="font-family-alt font-weight-900 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
                  <?php echo $form['name']; ?>
                </h3>
              </div>
              <div class="margin-8 no-margin-bottom no-margin-rl text-center">
                <!-- <form action="ted/test" method="post">
                <input type="hidden" name="<?php //echo $form['id'];?>">
                <input  value="Register" type="submit" name="submit">
              </form>   -->
              <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['userForm'].'?id='.$form['id'];?>"><span  class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl">Register</span></a>
              </div>
            </div>

            <!-- //.col-md-6 -->
          <?php endif; ?>
          <?php } ?>
      </div>
      <!-- //.row -->
    </div>
    <!-- //.container -->
  </section>
