<?php include('views\layouts\header.php'); ?>
<br><br><br><br><br><br><br>
<form action="<?php echo $GLOBALS['ASSET'].$GLOBALS['showForm'];?>" method="post" class="form-horizontal">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">First Name</label>
            <div class="col-md-4">
                <input id="textinput" name="fname" type="text" placeholder="First Name" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="Lname">Last Name</label>
            <div class="col-md-4">
                <input id="Lname" name="lname" type="text" placeholder="Last Name" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>
            <div class="col-md-4">
                <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="BirthDate">Birth Date</label>
            <div class="col-md-4">
                <input id="BirthDate" name="birthDate" type="date" placeholder="Birth Date" class="form-control input-md" required="">

            </div>
        </div>
        <?php 
        if(!isset($_SESSION['userTypeId'])){ $_SESSION['userTypeId'] = 1; }?>
        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-4">
                <input type="hidden" name="userTypeId" value="<?php echo $_SESSION['userTypeId'];?>" id="textinput" class="form-control input-md">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-4">
                <input type="hidden" name="registrationFormId" value="<?php echo $data['id']; ?>" id="textinput" class="form-control input-md">
            </div>
        </div>

        <!-- Multiple Radios (inline) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="ismale">Gender</label>
            <div class="col-md-4">
                <label class="radio-inline" for="ismale-0">
                    <input type="radio" name="ismale" id="ismale-0" value="1" checked="checked">
                    Male
                </label>
                <label class="radio-inline" for="ismale-1">
                    <input type="radio" name="ismale" id="ismale-1" value="0">
                    Female
                </label>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="submit">submit</label>
        <div class="col-md-4">
            <input type="submit" name="submit" value="submit" class="btn btn-success">
        </div>
        </div>

    </fieldset>
</form>

<?php include('views\layouts\footer.php'); ?>