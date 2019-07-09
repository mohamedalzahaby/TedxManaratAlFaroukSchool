<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class messageType extends Model 
{
    protected $name;

    public function __construct($id = '')
    {
        $this->tableName = 'messagetype';
        $this->columnNamesArr = array('name');
        if ($id != '') {
            $this->id = $id;
        }
    }

    public function store($request)
    {
        // var_dump($request); die();
        $name = $request['name'];
        $db = Controller::getInstance();
        $sql = "INSERT INTO `messagetype`(`name`) VALUES ('$name');";
        // echo $sql; die();
        $db->query($sql);
    }

    public function getTypes()
    {
        $allTypes = $this->selectAll($this->tableName);
        return $allTypes;
    }

    public function getHeaderId()
    {
        $db = Controller::getInstance();
        $sql = "SELECT * FROM `$this->tableName` WHERE `name` = 'header'; ";
        // echo $sql; die();
        $row = $db->queryFetchRowAssoc($sql);
        return $row['id'];
    }


    

    
}
