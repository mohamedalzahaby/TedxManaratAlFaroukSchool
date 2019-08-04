<?php
// include_once "app\controllers\controller.php";
include_once "model\DBHelper.php";
include_once "model\DataType.php";
$DataTypeModel = new DataType();
 $data = $DataTypeModel->SelectAllDataTypes();
  
  $ctr = $_POST['ctr'];
 
    $name = 'OptionType'.$ctr;
    $id = 'OptionType'.$ctr;
    echo  '<p><b>Option name</b></p>';
    echo  "<input type='text' name='optionName$ctr' placeholder='option name' required>";
    echo "<br><br><fieldset>
            <label><b>Option Type</b></label>";
            Controller::selectTag($name,$id,$data , 'id' , 'name');
     
    echo" </fieldset><br><br>";
    echo "<input type='hidden' name ='ctr' value = '$ctr'>";
         
  
?>
 