<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class DataType extends Model 
{

    public function __construct($id = '')
    {
        $this->tableName = 'dataTypes';
        if ($id != '') {
            $this->id = $id;
            $data = $this->getAllById($this->tableName,$this->name);
            $this->name = $data['name'];
        }
    }

    public function SelectAllDataTypes()
    {
        return $this->SelectAll($this->tableName);
    }
    public function store($request)
    {
        $dbobj = Controller::getInstance();
        foreach ($request as $key => $name) {
            $sql = "INSERT INTO `datatypes`(`name`) VALUES ('$name')";
            $dbobj->query($sql);
        }
    }


}
