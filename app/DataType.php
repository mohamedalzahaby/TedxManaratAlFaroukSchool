<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class DataType extends Model
{
protected $table;
    public function __construct($id = '')
    {
        $this->table = 'dataTypes';

    }

    public function SelectAllDataTypes()
    {
        return $this->SelectAll($this->table);
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
