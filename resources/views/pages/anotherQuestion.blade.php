<?php

  
  $ctr = $_POST['ctr'];
 
    $name = 'OptionType'.$ctr;
    echo  '<p><b>Question name</b></p>';
    echo  "<input type='text' name='optionName$ctr' placeholder='option name' required>";
    echo "<br><br><fieldset>
            <label><b>Question Type</b></label>";
            Controller::selectTag($name,$name,$data , 'id' , 'name');
     
    echo" </fieldset><br><br>";
    echo "<input type='hidden' name ='ctr' value = '$ctr'>";
         
  
?>
 