<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Registeration extends Model
{


    protected $table = 'Registeration';



    public function store($userId , $currentAcademicYearId)
    {
        DB::insert('insert into registeration (userId, academicYearId) values (?, ?)', [$userId, $currentAcademicYearId]);

    }


    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
    public function RegisterationDetails()
    {
        return $this->hasMany('App\RegisterationDetails');
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
