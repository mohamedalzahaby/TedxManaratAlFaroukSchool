<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class RegistrationFormType extends Model
{
    protected $table = 'registrationformtype';



    public function getAllTypes()
    {
        //returns an array of id and names
        $Columns = array('id' , 'name' );
        return Parent::getCertainColumns($this->table , $Columns);
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
    public function getIsForEventValue($formTypeId)
    {
        $isForEvent = DB::table($this->table)->select('isForEvent')->where('id' ,$formTypeId)->first()->isForEvent;
        return $isForEvent;
    }




}
