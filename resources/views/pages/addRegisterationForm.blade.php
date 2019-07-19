<section id="registration" class="bg-white-2">
    <div class="container">
      <div class="row no-padding-rl">
        <div class="col-md-12">
          <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
            Add Registeration Form
          </h2>
          <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl separator-line-extra-thick-long"></span>
        </div>
        <!-- //.col-md-12 -->
      </div>
      <!-- //.row -->

      <form method="POST" action="<?php echo $GLOBALS['ASSET'].$GLOBALS['addRegisterationType']; ?>" class="form-horizontal">
        <fieldset>

          <!-- Form Name -->
          <legend>Add Form Type</legend>

          <!-- Appended Input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="appendedtext">Add registration Type</label>
            <div class="col-md-4">
              <div class="input-group">
                <input id="registrationTypeName" name="name" class="form-control" placeholder="registration Type" type="text">
                <button type="submit" name='submit' id="registrationTypeNameButton" ><span class="input-group-addon">ADD</span></button>
              </div>
              <p class="help-block">enter new registration Type</p>
            </div>
          </div>
        </fieldset>
  </form>


      <form method="POST" action="<?php echo $GLOBALS['ASSET'].$GLOBALS['register'].$GLOBALS['addForm'];?>" class="form-horizontal">
        <fieldset>
          <!-- Form Name -->
          <legend>Add Registeration Form</legend>
          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="RegisterationType">Registeration Type</label>
            <div class="col-md-4">
              <?php Controller::selectTag('RegisterationType', 'registerationFormType', $data['RegistrationFormTypes'],'id' , 'name' ,'class="form-control"'); ?>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="RegisterAs">Applicant Register as</label>
            <div class="col-md-4">
              <?php Controller::selectTag('RegisterAs', 'RegisterAs', $data['userTypes'],'id' , 'name', 'class="form-control"'); ?>
            </div>
          </div>
        </fieldset>
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
          <div class="col-md-4">
            <input type="submit" id="singlebutton" value="submit" name="singlebutton" class="btn btn-primary">
          </div>
        </div>
      </form>
