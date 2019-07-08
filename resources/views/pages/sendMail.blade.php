<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="app\libary\ckeditor\ckeditor.js"></script>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
    </head>
    <body>

    <section id="registration" class="bg-white-2">
  <div class="container">
    <div class="row no-padding-rl">
      <div class="col-md-12">
        <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
          Send A Mail
        </h2>
        <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl separator-line-extra-thick-long"></span>
      </div>
      <!-- //.col-md-12 -->
    </div>
    <!-- //.row -->

    <form method="POST" action="<?php echo $GLOBALS['ASSET'].$GLOBALS['sendMail'].'/'.$GLOBALS['addMessageType']; ?>" class="form-horizontal">
      <fieldset>

        <!-- Form Name -->
        <legend>Add Message Type</legend>

        <!-- Appended Input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="appendedtext">Add Message Type</label>
          <div class="col-md-4">
            <div class="input-group">
              <input  name="name" class="form-control" placeholder="Message Type" type="text">
              <button type="submit" name='submit'><span class="input-group-addon">ADD</span></button>
            </div>
            <p class="help-block">enter new message Type</p>
          </div>    
        </div>
      </fieldset>
</form>


<form method="POST" action="<?php echo $GLOBALS['tedx'].$GLOBALS['sendMail'].'/'.$GLOBALS['decorateMail'];?>"  class="form-horizontal">
      <fieldset>
        <!-- Form Name -->
        <legend>Add message Form</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" >Message Name</label>  
            <div class="col-md-4">
                <input  name="name" type="text" placeholder="Message Name" class="form-control input-md">
                <span class="help-block">Add Message Name</span>  
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" >message Type</label>
          <div class="col-md-4">
            <?php Controller::selectTag('MessageType', 'MessageTypeId', $data,'id' , 'name' ,'class="form-control"'); ?>
          </div>
        </div>
        <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>

        </fieldset>
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" >submit</label>
          <div class="col-md-4">
            <input type="submit"value="submit" name="singlebutton" class="btn btn-primary">
          </div>
        </div>
    </form>

    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );

           
            </script>
            

    </body>
</html>