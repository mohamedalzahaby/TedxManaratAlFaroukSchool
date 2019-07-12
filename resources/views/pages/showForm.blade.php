@extends('layouts.app')
@section('content')
<form action="<?php echo $GLOBALS['ASSET'].$GLOBALS['showForm'].$GLOBALS['submit'];?>" method="post" class="form-horizontal">
<fieldset>

<br><br><br><br><br><br><br><br><br>
<?php foreach ($data as $key => $question) {?>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput"><?php echo $question['name'];?></label>
    <div class="col-md-4">
    <input type="<?php echo $question['dataTypeId'];?>"  name="<?php echo $question['id'];?>" placeholder="<?php echo $question['name'];?>" >

    </div>
  </div>
  <?php } ?>
  <div class="form-group">
    <label class="col-md-4 control-label" for="textinput"></label>
    <div class="col-md-4">
    <input type="submit" value="submit"  class="form-control input-md">
    </div>
  </div>

</fieldset>

</form>
<?php include('views\layouts\footer.php'); ?>
