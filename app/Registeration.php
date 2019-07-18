<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Registeration extends Model
{
    protected $userId;



    public function __construct($id = '')
    {
        $this->tableName = 'Registeration';
        if ($id != '') {
            $this->id = $id;
            $row = getAllById($this->tableName,$this->id);
            $this->userId = $row['userId'];
            $this->academicYearId = $row['academicYearId'];
        }
    }

    public function store($id)
    {
        $db = Controller::getInstance();
        $sql = "INSERT INTO `registeration`(`userId`, `academicYearId`) VALUES ($id , 1)";
        $db->query($sql);
        $lastId = $db->lastInsertId('registeration');
        $this->id = $lastId;
    }

    public function getLastId()
    {
        return $this->id;
    }
    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserRegisterations($id)
    {
        $db = Controller::getInstance();

        // return $this->getByColumn($this->tableName,'userId',$id,'id');
        $sql = "SELECT `id` FROM `$this->tableName` WHERE `userId` = $id AND `isdeleted` = 0;";
        // die($sql);
        $query = $db->queryFetchAllAssoc($sql);
        // $data = $query->fetch(PDO::FETCH_ASSOC);
        // var_dump($query); echo "<br>";
        $ids = [];
        $vv = NULL;
        foreach ($query as $key1 => $value) {
            foreach ($value as $key2 => $v) {
                array_push($ids ,$v);
            }
        }
        return $ids;
    }



}
