<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class RegistrationFormType extends Model implements Icrud
{   
    public function __construct($id = '')
    {
        $this->tableName = 'registrationformtype';
        if ($id != '') {
            $this->id = $id;
            $row = getAllById($this->tableName,$this->id);
            $this->name = $row['name'];
        } 
    }

    public function getAllTypes()
    {   
        //returns an array of id and names
        return $this->getData($this->tableName , 'name');
    }
    
    
    
    

    public function store($request)
    {
        $Model = controller::getInstance();
        $this->name = $request['name'];
        $name = $this->name;
        $tableName = $this->tableName;
        $sql = "INSERT INTO `$tableName`(`name`) VALUES ('$name');";
        //  die($sql);
        $query = $Model->query($sql);
    }
    public function IsForEvent($formTypeId)
    {
        $db = controller::getInstance();
        $sql = "SELECT `isForEvent` FROM `$this->tableName` WHERE `id` = $formTypeId;";
        // var_dump($sql);
        // echo "<br>";
        // die();
        $isForEvent = $db->queryFetchRowAssoc($sql);
        return $isForEvent;

    }
    public function update($request){}
    public function delete($request){}
    public function search($request){}


    
}
